<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('general_helper');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('register_model');
	}

	public function saveregister(){
		$savedata = array(
			'username' => $_POST['reg_username'], 
			'email' => $_POST['reg_email'], 
			'mobile_no' => $_POST['reg_mobile'], 
			'password' => md5($_POST['reg_pass']), 
			'c_pass' => $_POST['reg_cpass'], 
			'user_id' => '1'
		);

		$chkuser = $this->register_model->checkuser($savedata);
		$chkmail = $this->register_model->checkmail($savedata);
		$chkmobl = $this->register_model->checkphon($savedata);

		if ($chkmail['email'] == $savedata['email']){
			$this->session->set_flashdata('exists', 'This email is already register.');
			redirect(base_url('login/#logPanel'));
		}
		elseif($chkuser['username'] == $savedata['username']){
			$this->session->set_flashdata('exists', 'This username is already taken, please try with different name.');
			redirect(base_url('login/#logPanel'));
		}
		elseif($chkmobl['mobile_no'] == $savedata['mobile_no']){
			$this->session->set_flashdata('exists', 'This Mobile number is already register.');
			redirect(base_url('login/#logPanel'));
		}
		else{
			$insert_id = $this->register_model->addregister($savedata);
			$this->session->set_flashdata('success', 'You are registered successfully.');
			redirect(base_url('login/#logPanel'));
		}
	}

}
