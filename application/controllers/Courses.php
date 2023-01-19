<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Courses extends CI_Controller
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
		$header['title'] = "Courses | IMA Jodhpur";

		$this->load->view('header', $header);
		$this->load->view('pages/course');
		$this->load->view('footer');
	}

	public function courseEnquiry()
	{
		$enquiry = array(
			'stream' => $_POST['coursestream'], 
			'class' => $_POST['corClass'],
			'medium' => $_POST['corMedium'],
			'submitDate' => date('d/m/Y')
		);

		// print_r($enquiry); exit;

		redirect(base_url('courses/course-submit/'));	
	}

	public function courseSubmit()
	{
		$header['title'] = "Courses | IMA Jodhpur";

		$this->load->view('header', $header);
		$this->load->view('pages/coursesub');
		$this->load->view('footer');
	}

	public function addEnquiryAbt()
	{
		$enqData = array('name'=>$_POST['tname'], 'email'=>$_POST['temail'], 'mobile'=>$_POST['tphone'], 'stream'=>$_POST['tstrem'], 'class'=>$_POST['tclass'], 'medium'=>$_POST['tmedium'], 'agree'=>$_POST['tagree'], 'date_info'=> date('j\-F\-Y'));

		if($this->input->post('tsubmit')!='')
		{
			$enqSave = $this->register_model->saveEnquiry($enqData);

			$this->session->set_flashdata('talkMessageAbt', 'Your query send to our experts. They will contact you soon.');
			redirect(base_url('courses/course-submit/'));
		}
		else{
			$this->session->set_flashdata('talkMessageAbt', 'Oops something went wrong. Try again.');
			redirect(base_url('courses/course-submit/'));
		}
	}

}
