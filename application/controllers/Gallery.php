<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller
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
		$this->load->model('photo_model');
		$this->load->model('category_model');
	}

	public function index()
	{
		$header['title'] = "Image Gallery | Oasis Sainik School";

        $data['head'] = "Image Gallery";
		$data['subhead'] = "Image-Gallery";
		$data['categories'] = $this->category_model->getAllResult();

		$this->load->view('header', $header);
		$this->load->view('pages/gallery', $data);
		$this->load->view('footer');
	}

	public function photos()
	{
		$category_id = $this->uri->segment(3);

		$data['detail'] = $this->category_model->getData($category_id);

		$header['title'] = $data['detail']['title']." | Oasis Sainik School";
        $data['head'] = $data['detail']['title'];
		$data['subhead'] = $data['detail']['title'];

		$data['photos'] = $this->photo_model->getImageByCategory($category_id);

		$this->load->view('header', $header);
		$this->load->view('pages/photos', $data);
		$this->load->view('footer');
	}

}
