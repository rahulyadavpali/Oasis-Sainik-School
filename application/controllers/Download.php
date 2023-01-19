<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller
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
		$this->load->model('downloads_model');
	}

	public function index()
	{
		$header['title'] = "Downloads | Oasis Sainik School";

        $data['head'] = "Downloads";
		$data['subhead'] = "Downloads";
        $data['downloads'] = $this->downloads_model->getAllResult();

		$this->load->view('header', $header);
		$this->load->view('pages/downloads', $data);
		$this->load->view('footer');
	}

}