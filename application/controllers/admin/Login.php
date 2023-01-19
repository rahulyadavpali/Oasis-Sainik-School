<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
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
		$header['title'] = "Admin Login - Oasis Sainik School";
		$this->load->view('admin/pages/login_adm', $header);
	}

	public function loginAdmin()
	{
		$userData = array('username' => $_POST['username'], 'password' => md5($_POST['password']));
		// print_r($userData); exit;
		$checkUser = $this->user_model->usrLgn($userData);

		if($userData['username'] == $checkUser['username'] && $userData['password'] == $checkUser['password'])
		{
			$usr_id = array('user_id' => $checkUser['user_id'], 'user_n' => $checkUser['username']);
			$this->session->set_userdata($usr_id);
			redirect(base_url('admin/dashboard'));
		}
		else
		{
			$this->session->set_flashdata('error', 'Check Your Username & Password.');
			redirect(base_url('admin/'));
		}
	}

}