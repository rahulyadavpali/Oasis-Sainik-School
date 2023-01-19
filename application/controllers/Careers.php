<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Careers extends CI_Controller
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
		$header['title'] = "Jobs | Oasis Sainik School";
		$data['head'] = "Jobs At Oasis Sainik School";
		$data['subhead'] = "Jobs-At-Oasis-Sainik-School";

		$this->load->view('header', $header);
		$this->load->view('pages/careers', $data);
		$this->load->view('footer');
	}

}
