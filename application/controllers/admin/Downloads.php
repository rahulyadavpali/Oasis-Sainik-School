<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Downloads extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('general_helper');
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('downloads_model');
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
			$header['title'] = "Downloads - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allresult'] = $this->downloads_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/download/list', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function add()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Add New Downloads - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/download/add', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function saveResult()
	{
		$resultId = getMaxId('tb_downloads', 'id');

		$resultData = array(
			'title'=> $_POST['title'], 
			'links' => $_POST['links']
		);

        $ret = $this->downloads_model->saveResultLink($resultData);
        redirect('admin/downloads/');
	}

	public function delete()
	{
		$r_id = $this->input->post('value');
		$ret = $this->downloads_model->deleteRes($r_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

}