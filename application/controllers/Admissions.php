<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admissions extends CI_Controller
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

	// Admission Procedure ------------------------------------------
	public function index()
	{
		$header['title'] = "Admission Procedure | Oasis Sainik School";
		$data['head'] = "Admission Procedure";
		$data['subhead'] = "Admission-Procedure";

		$this->load->view('header', $header);
		$this->load->view('pages/admission_procedure', $data);
		$this->load->view('footer');
	}

	// Fee Structure ------------------------------------------
	public function structure()
	{
		$header['title'] = "Fee Structure | Oasis Sainik School";
		$data['head'] = "Fee Structure";
		$data['subhead'] = "Fee-Structure";

		$this->load->view('header', $header);
		$this->load->view('pages/fee_structure', $data);
		$this->load->view('footer');
	}

}
