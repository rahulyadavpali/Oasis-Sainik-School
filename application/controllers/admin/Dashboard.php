<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
		$this->load->model('user_model');
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
			$header['title'] = "Dashboard - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/pages/dashboard_adm', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function updateProfile()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usr = $this->session->userdata('user_n');

		$usr_ses['usrpas_det'] = $this->user_model->get_pass($ses_usr);

		if($sess != 1)
		{
			redirect(base_url('/login'));
		}
		else
		{
			$header['title'] = "Update Profile - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$this->load->view('user_header', $header);
			$this->load->view('user/sidebar');
			$this->load->view('user/update_profile', $usr_ses);
			$this->load->view('user_footer');
		}
	}

	public function updatePassword()
	{
		$newPass = array('username' => $_POST['usernme'], 'password' => md5($_POST['newpass']), 'c_pass' => $_POST['renewpass']);
		$ses_usrs = $this->session->userdata('user_n');

		if($ses_usrs == $newPass['username'])
		{
			$this->user_model->updatePass($newPass);
			$this->session->set_flashdata('success', 'New password update successfully.');
			redirect(base_url('user/edit-profile/'));
		}
		else
		{
			$this->session->set_flashdata('pass_error', 'There is some error, please try later.');
			redirect(base_url('user/edit-profile/'));
		}
	}

	public function logout()
	{
		$usr_id = array('user_id' => '', 'user_n' => '');
		$this->session->set_userdata($usr_id);
		$this->session->unset_userdata($usr_id);
		redirect(base_url('/admin'));
	}
}