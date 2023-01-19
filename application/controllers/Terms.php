<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Terms extends CI_Controller
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
	}

	public function index()
	{
		$header['title'] = "Terms & Conditions | Oasis Sainik School";
		$data['head'] = "Terms & Conditions";
		$data['subhead'] = "Terms-And-Conditions";

		$this->load->view('header', $header);
		$this->load->view('pages/terms_conditions', $data);
		$this->load->view('footer');
	}

	public function policy()
	{
		$header['title'] = "Privacy Policy | Oasis Sainik School";
		$data['head'] = "Privacy Policy";
		$data['subhead'] = "Privacy-Policy";

		$this->load->view('header', $header);
		$this->load->view('pages/privacy_policy', $data);
		$this->load->view('footer');
	}

}