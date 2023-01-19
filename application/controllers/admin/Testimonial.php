<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends CI_Controller
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
		$this->load->model('testimonial_model');
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
			$header['title'] = "Testimonial Detail - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allcontact'] = $this->testimonial_model->getAllReview();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/testimonial/list', $result, $ses_usrnm);
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
			$header['title'] = "Add New Review - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/testimonial/add', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function addNew()
	{
		$reviewId = getMaxId('testimonial_db', 'id');

		$reviewData = array(
			'name' => $_POST['name'], 
			'message' => $_POST['message'], 
			'review_title' => $_POST['rev_alt'], 
			'status' => '1' 
		);
		// print_r($reviewData);

		if($_FILES['review_image']['name'] != "")
		{
			$ext_thumbnail = explode(".",$_FILES['review_image']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'testimonials/';
				$upload_thumbnail['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'testimonial-'.$reviewId.".".$ext_thumbnail;
				$reviewData['review_image'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('review_image') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/testimonial/add/');
				}

				$ret = $this->testimonial_model->addReview($reviewData);
				redirect('admin/testimonial');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE.';
				$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/testimonial/add/');
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

			$header['title'] = "Edit Review - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$editData['id_data'] = $this->testimonial_model->getEnrollData($edit_id);

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/testimonial/edit', $editData, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function updateData()
	{
		$updateData = array(
			'id' => $_POST['updateid'], 
			'name' => $_POST['name'], 
			'message' => $_POST['message'], 
			'review_img_title' => $_POST['rev_alt']
		);

		$edit_id = $_POST['updateid'];
		$oldImg = $_FILES['review_image']['name'];
		$editImg = $this->testimonial_model->getEnrollData($edit_id);

		if($oldImg == "")
		{
			$upText = $this->testimonial_model->updateData($updateData);
			redirect(base_url('admin/testimonial/'));
		}
		else
		{
			$ext_thumbnail = explode(".",$_FILES['review_image']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'testimonials/';
				$upload_thumbnail['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'testimonial-'.$edit_id.".".$ext_thumbnail;
				$updateData['review_image'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('review_image') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/testimonial/edit/');
				}

				$ret = $this->testimonial_model->updateImage($updateData);
				redirect('admin/testimonial');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE A IMAGE.';
				$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/testimonial/add/');
			}
		}

	}

	public function delete()
	{
		$t_id = $this->input->post('value');
		$ret = $this->testimonial_model->deleteReview($t_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

}