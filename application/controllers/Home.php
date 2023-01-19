<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
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
		$this->load->model('announcment_model');
		$this->load->model('news_model');
		$this->load->model('testimonial_model');
	}

	public function index()
	{
		$header['title'] = "Oasis Sainik School | Home";
		$data['testimonial'] = $this->testimonial_model->getAllReview();
		$data['announcment'] = $this->announcment_model->getAllResult();
		$data['news'] = $this->news_model->getAllResult();
		$data['testimonial'] = $this->testimonial_model->getAllReview();

		$this->load->view('header', $header);
		$this->load->view('pages/home', $data);
		// $this->load->view('footer');
	}

	public function addExpert()
	{
		$enqData = array('name'=>$_POST['tname'], 'email'=>$_POST['temail'], 'mobile'=>$_POST['tphone'], 'stream'=>$_POST['tstrem'], 'class'=>$_POST['tclass'], 'medium'=>$_POST['tmedium'], 'agree'=>$_POST['tagree'], 'date_info'=> date('j\-F\-Y'));

		if($this->input->post('tsubmit')!='')
		{
			$enqSave = $this->register_model->saveEnquiry($enqData);

			$this->session->set_flashdata('talkMessageHome', 'Your query send to our experts. They will contact you soon.');
			redirect(base_url('home/'));
		}
		else{
			$this->session->set_flashdata('talkMessageHome', 'Oops something went wrong. Try again.');
			redirect(base_url('home/'));
		}
	}

	public function enquiry()
	{
		$header['title'] = "Oasis Sainik School | Talk To Expert | Enquiry";
		$data['testimonial'] = $this->testimonial_model->getAllReview();

		$this->load->view('header', $header);
		$this->load->view('pages/enquiry', $data);
		$this->load->view('footer');
	}

	public function addEnquiry()
	{
		$enqData = array('name'=>$_POST['tname'], 'email'=>$_POST['temail'], 'mobile'=>$_POST['tphone'], 'stream'=>$_POST['tstrem'], 'class'=>$_POST['tclass'], 'medium'=>$_POST['tmedium'], 'agree'=>$_POST['tagree'], 'date_info'=> date('j\-F\-Y'));

		if($this->input->post('tsubmit')!='')
		{
			$enqSave = $this->register_model->saveEnquiry($enqData);

			$this->session->set_flashdata('talkMessageWhy', 'Your query send to our experts. They will contact you soon.');
			redirect(base_url('enquiry/'));
		}
		else{
			$this->session->set_flashdata('talkMessageWhy', 'Oops something went wrong. Try again.');
			redirect(base_url('enquiry/'));
		}
	}

}
