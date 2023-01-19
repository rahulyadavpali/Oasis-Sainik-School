<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Result extends CI_Controller
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
		$this->load->model('result_model');
	}

	public function index()
	{
		$header['title'] = "Result | IMA Jodhpur";
		$medical = 'Medical';
		$enginer = 'Engineering';
		$foundation = 'Foundation';
		$result['neet'] = $this->result_model->getneetResult($medical);
		$result['enginer'] = $this->result_model->getenginerResult($enginer);
		$result['foundation'] = $this->result_model->getenginerResult($foundation);

		// $result['allresult'] = $this->resultmodel->getAllResult();

		$this->load->view('header', $header);
		$this->load->view('pages/result', $result);
		$this->load->view('footer');
	}

	public function addExpertRas()
	{
		$enqData = array('name'=>$_POST['tname'], 'email'=>$_POST['temail'], 'mobile'=>$_POST['tphone'], 'stream'=>$_POST['tstrem'], 'class'=>$_POST['tclass'], 'medium'=>$_POST['tmedium'], 'agree'=>$_POST['tagree'], 'date_info'=> date('j\-F\-Y'));

		if($this->input->post('tsubmit')!='')
		{
			$enqSave = $this->register_model->saveEnquiry($enqData);

			$this->session->set_flashdata('talkMessageRa', 'Your query send to our experts. They will contact you soon.');
			redirect(base_url('results/'));
		}
		else{
			$this->session->set_flashdata('talkMessageRa', 'Oops something went wrong. Try again.');
			redirect(base_url('results/'));
		}
	}

}
