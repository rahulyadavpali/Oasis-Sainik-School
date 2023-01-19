<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Info extends CI_Controller
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
		$header['title'] = "RTE | Oasis Sainik School";
		$data['head'] = "RTE";
		$data['subhead'] = "RTE";

		$this->load->view('header', $header);
		$this->load->view('pages/rte', $data);
		$this->load->view('footer');
	}

}
