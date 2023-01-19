<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Lesson extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('general_helper');
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('lesson_model');
		$this->load->model('book_model');
	}

	public function index()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Lesson Planner Detail - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allresult'] = $this->lesson_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/lesson/list', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function add()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Add New Lesson Planner - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/lesson/add', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function saveResult()
	{
		$resultId = getMaxId('lesson_planner_db', 'id');

		$resultData = array(
			'date' => '0'.date('d'), 
			'month' => date('M'), 
			'title'=> $_POST['title'], 
			'video_link' => $_POST['video_lnk'], 
			'stream' => $_POST['stream']
		);

		if($_FILES['pdf']['name'] != "")
		{
			$ext_thumbnail = explode(".",$_FILES['pdf']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('pdf','JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'lessons/';
				$upload_thumbnail['allowed_types'] = 'pdf|jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'lessons-'.$resultId.".".$ext_thumbnail;
				$resultData['pdf'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('pdf') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE A PDF OR Image';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/lesson/add/');
				}

				$ret = $this->lesson_model->saveResultData($resultData);
				redirect('admin/lesson/');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE A PDF OR Image';
				$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/lesson/add/');
			}
		}
		else
		{
			$ret = $this->lesson_model->saveResultLink($resultData);
			redirect('admin/lesson/');
		}
	}

	public function delete()
	{
		$r_id = $this->input->post('value');
		$ret = $this->lesson_model->deleteRes($r_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

}