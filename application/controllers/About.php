<?php defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller
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
		$this->load->model('testimonial_model');
	}

	// About Oasis ------------------------------------------
	public function index()
	{
		$header['title'] = "About Oasis | Oasis Sainik School";
		$data['head'] = "About Oasis";
		$data['subhead'] = "About-Oasis";

		$this->load->view('header', $header);
		$this->load->view('pages/about', $data);
		$this->load->view('footer');
	}

	// Management Council ------------------------------------------
	public function council()
	{
		$header['title'] = "Management Council | Oasis Sainik School";
		$data['head'] = "Management Council";
		$data['subhead'] = "Management-Council";

		$this->load->view('header', $header);
		$this->load->view('pages/council', $data);
		$this->load->view('footer');
	}

	// Principal Message ------------------------------------------
	public function message()
	{
		$header['title'] = "Principal Message | Oasis Sainik School";
		$data['head'] = "Principal Message";
		$data['subhead'] = "Principal-Message";

		$this->load->view('header', $header);
		$this->load->view('pages/principal', $data);
		$this->load->view('footer');
	}

	// Infrastructure ------------------------------------------
	public function infrastructure()
	{
		$header['title'] = "Infrastructure | Oasis Sainik School";
		$data['head'] = "Infrastructure";
		$data['subhead'] = "Infrastructure";

		$this->load->view('header', $header);
		$this->load->view('pages/infrastructure', $data);
		$this->load->view('footer');
	}

}
