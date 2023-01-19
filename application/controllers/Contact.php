<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller
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
		$header['title'] = "Contact Us | Oasis Sainik School";
		$data['head'] = "Contact Us";
		$data['subhead'] = "Contact-Us";

		$this->load->view('header', $header);
		$this->load->view('pages/contact', $data);
		$this->load->view('footer');
	}

	public function mailSave()
	{
		$saveContact = array('name' => $_POST['name'], 'email' => $_POST['email'], 'subject' => $_POST['subject'], 'mobile' => $_POST['mobile'], 'message' => $_POST['message']);

		if($this->input->post('submitContact')!='')
		{
			$saveData = $this->register_model->addContact($saveContact);
			$this->session->set_flashdata('contactMessage', 'Your message send successfully. Our Team contact you soon.');
			redirect(base_url('contact-us/'));
		}
		else
		{
			$this->session->set_flashdata('contactMessage', 'Oops something went wrong. Try again.');
			redirect(base_url('contact-us/'));
		}
	}

}