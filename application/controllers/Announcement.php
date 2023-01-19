<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Announcement extends CI_Controller
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
		$this->load->model('announcment_model');
		$this->load->model('news_model');
	}

	public function index()
	{
		$header['title'] = "Announcement | IMA Jodhpur";
		$data['announcment'] = $this->announcment_model->getAllResult();

		$this->load->view('header', $header);
		$this->load->view('pages/announcement', $data);
		$this->load->view('footer');
	}

	public function news()
	{
		$header['title'] = "News | IMA Jodhpur";
		$data['news'] = $this->news_model->getAllResult();

		$this->load->view('header', $header);
		$this->load->view('pages/news', $data);
		$this->load->view('footer');
	}

}