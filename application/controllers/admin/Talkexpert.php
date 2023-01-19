<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Talkexpert extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('general_helper');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('register_model');
	}

	public function index()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Talk To Expert Detail - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allcontact'] = $this->register_model->getAllEnquiry();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/talk_expert/talklist', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function delete()
	{
		$e_id = $this->input->post('value');
		$ret = $this->register_model->deleteEnquiry($e_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully');
		echo ('['.json_encode($data).']');
	}

}