<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Resultadm extends CI_Controller
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
		$this->load->model('result_model');
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
			$header['title'] = "Result Detail - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allresult'] = $this->result_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/result/list', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function addRes()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Add New Result - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/result/add', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function saveResult()
	{
		$resultId = getMaxId('result_db', 'id');

		$resultData = array(
			'field' => $_POST['field'], 
			'rank'=> $_POST['rank'], 
			'name' => $_POST['rname'], 
			'collage' => $_POST['collage'], 
			'image_name' => $this->input->post('result_image'), 
			'image_title' => $_POST['img_title'], 
			'image_alt' => $_POST['img_alt'], 
			'status' => '1'
		);

		// print_r($resultData);

		if($_FILES['result_image']['name'] != "")
		{
			$ext_thumbnail = explode(".",$_FILES['result_image']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'results/';
				$upload_thumbnail['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'results-'.$resultId.".".$ext_thumbnail;
				$resultData['result_image'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('result_image') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/result/add/');
				}

				$ret = $this->result_model->saveResultData($resultData);
				redirect('admin/result');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE';
				$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/result/add/');
			}
		}
	}

	public function openEdit()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$edit_id = $this->uri->segment(4);

			$header['title'] = "Edit Result - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$editData['id_data'] = $this->result_model->getResultData($edit_id);

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/result/edit', $editData, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function updateData()
	{
		$updateData = array(
			'id' => $_POST['updateid'], 
			'field' => $_POST['field'], 
			'rank' => $_POST['rank'],
			'name' => $_POST['rname'], 
			'collage' => $_POST['collage'],
			'image_title' => $_POST['img_title'], 
			'image_alt' => $_POST['img_alt']
		);

		// echo '<pre>'; print_r($updateData); echo '</pre>'; exit;

		$edit_id = $_POST['updateid'];
		$oldImg = $_FILES['result_image']['name'];
		$editImg = $this->result_model->getResultData($edit_id);

		if($oldImg == "")
		{
			$upText = $this->result_model->updateData($updateData);
			redirect(base_url('admin/resultadm/'));
		}
		else
		{
			$ext_thumbnail = explode(".",$_FILES['result_image']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'results/';
				$upload_thumbnail['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'testimonial-'.$edit_id.".".$ext_thumbnail;
				$updateData['result_image'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('result_image') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/resultadm/edit/');
				}

				$ret = $this->result_model->updateImage($updateData);
				redirect('admin/resultadm');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE.';
				$this->session->set_flashdata('item',$this->upload->display_errors());
				redirect('admin/resultadm/edit/');
			}
		}
	}

	public function deleteResult()
	{
		$r_id = $this->input->post('value');
		$ret = $this->result_model->deleteRes($r_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

}