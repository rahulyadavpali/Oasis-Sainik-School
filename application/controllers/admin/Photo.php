<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Photo extends CI_Controller
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
		$this->load->model('category_model');
		$this->load->model('photo_model');
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
			$header['title'] = "Photo Gallery - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allresult'] = $this->photo_model->getAllResult();
			$result['allcategory'] = $this->category_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/gallery/list', $result, $ses_usrnm);
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
			$header['title'] = "Add New Photo - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allcategory'] = $this->category_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/gallery/add', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function saveResult()
	{
		$resultId = getMaxId('gallery_db', 'id');
		$invID = str_pad($resultId, 3, '0', STR_PAD_LEFT);
        $insert;

		$resultData = array('title'=> $_POST['title'],'category'=> $_POST['category']);

		if($_FILES['pdf']['name'] != ""){
			$ext_thumbnail = explode(".",$_FILES['pdf']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check)){
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'gallery/';
				$upload_thumbnail['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = FALSE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'gallery-photo-'.$resultId.".".$ext_thumbnail;
				$resultData['pdf'] = $thumbnail_upload;
				$this->upload->initialize($upload_thumbnail);

				if($this->upload->do_upload('pdf') == FALSE){
					$data['error'] = 'THE UPLOADED FILE MUST BE A PDF OR Image';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/photo-gallery/add/');
				}

				$ret = $this->photo_model->saveResultData($resultData);

				if($_FILES['VehicleImage1']['name'] != ""){
                    if(count($_FILES['VehicleImage1']['name']) > 0){
                        $VehicleName1_new = array();
                        $VehicleName1 = '';
                        $config = array(
                            'upload_path'   => UPLOAD_ROOT_PATH.'gallery/', 
                            'allowed_types' => 'jpg|JPG|png|PNG|jpeg|JPEG', 
                            'overwrite'     => 1
                        );
                        $images = array();
                        $j = 1;

                        foreach($_FILES['VehicleImage1']['name'] as $key => $value ){
                            $filename = $_FILES['VehicleImage1']['name'][$key][0];
                            $filetype = $_FILES['VehicleImage1']['type'][$key][0];
                            $file_tmp_name = $_FILES['VehicleImage1']['tmp_name'][$key][0];
                            $ArrExt = explode(".",$filename);
                            $i++;
                            $ext = end($ArrExt);
                            if($filename!=""){
                                if(isset($_POST['image1'][$key][0]) && $_POST['image1'][$key][0]!=""){
                                    $this->photo_model->singleCarImageDefilebyfile($resultId,$_POST['image1'][$key][0]);
                                }
                                $newfilename='gallery-photo-'.$resultId.'-sub-'.$i.".".$ext;
                                $path = UPLOAD_ROOT_PATH.'gallery/';
                                if(file_exists($path)){
                                    $carid = getMaxId('gallery_db','id');
                                    $newfilename = 'gallery-photo-'.$resultId.'-sub-'.$carid.'-'.$i.".".$ext;
                                    $path = UPLOAD_ROOT_PATH.'gallery/'.$newfilename;
                                }
                                move_uploaded_file($file_tmp_name,$path);
                                $data  = array('category'=> $_POST['category'], 'title'=> $_POST['title'], 'Image_name' => $newfilename, 'vehicle_id' => $resultId);
                                // print_r($data); exit;
                                $ret   = $this->photo_model->addImage($data);
                            }
                        }
                    }
                    redirect('admin/photo-gallery/');
                }
                redirect('admin/photo-gallery/');
                // else{$this->session->set_flashdata('item', 'please upload image width 800 or height 1000');redirect('admin/agroproduct/add');}
            }
            else{
                $data['error'] = 'THE UPLOADED FILE MUST BE A PDF OR Image';
				$this->session->set_flashdata('item',$this->upload->display_errors());
                redirect('admin/photo-gallery/add/');
            }
		}
		else{
			$data['error'] = 'THE UPLOADED FILE MUST BE A PDF OR Image';
			$this->session->set_flashdata('item',$this->upload->display_errors());
			redirect('admin/photo-gallery/add/');
		}
	}

	public function delete()
	{
		$r_id = $this->input->post('value');
		$ret = $this->photo_model->deleteRes($r_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

	// Category ---
	public function catergory()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "Add New Category - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/gallery/addcat', $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function viewCatergory()
	{
		$sess = $this->session->userdata('user_id');
		$ses_usrnm['usernm'] = $this->session->userdata('user_n');

		if($sess != 1)
		{
			redirect(base_url('/admin'));
		}
		else
		{
			$header['title'] = "All Image Category - Oasis Sainik School";
			$header['header_title'] = "Oasis Sainik School";
			$result['allresult'] = $this->category_model->getAllResult();

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/gallery/category', $result, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function saveCatergory()
	{
		$resultId = getMaxId('tb_img_category', 'id');
		$invID = str_pad($resultId, 3, '0', STR_PAD_LEFT);
        $insert;

		$resultData = array(
			'title'=> $_POST['title'],
			'description'=> $_POST['description'],
		);

		if($_FILES['pdf']['name'] != "")
		{
			$ext_thumbnail = explode(".",$_FILES['pdf']['name']);
			$ext_thumbnail = strtolower($ext_thumbnail[1]);
			$check = array('pdf','JPG','jpg','png','PNG','JPEG','jpeg');

			if(in_array($ext_thumbnail, $check))
			{
				$upload_thumbnail['upload_path'] = UPLOAD_ROOT_PATH.'category/';
				$upload_thumbnail['allowed_types'] = 'pdf|jpg|JPG|png|PNG|jpeg|JPEG';
				$upload_thumbnail['overwrite'] = TRUE;
				$thumbnail_upload = $upload_thumbnail['file_name'] = 'category-'.$resultId.".".$ext_thumbnail;
				$resultData['pdf'] = $thumbnail_upload;

				$this->upload->initialize($upload_thumbnail);
				if($this->upload->do_upload('pdf') == FALSE)
				{
					$data['error'] = 'THE UPLOADED FILE MUST BE An Image Format';
					$this->session->set_flashdata('item',$this->upload->display_errors());
					redirect('admin/photo-gallery/catergory/');
				}

				$ret = $this->category_model->saveResultData($resultData);
				redirect('admin/photo-gallery/all-catergory/');
			}
			else
			{
				$data['error'] = 'THE UPLOADED FILE MUST BE An Image Format';
				$this->session->set_flashdata('item',$this->upload->display_errors());
				redirect('admin/photo-gallery/catergory/');
			}
		}
		else
		{
			$data['error'] = 'THE UPLOADED FILE MUST BE An Image Format';
			$this->session->set_flashdata('item',$this->upload->display_errors());
			redirect('admin/photo-gallery/catergory/');
		}
	}

	public function editCategory()
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
			$editData['id_data'] = $this->category_model->getData($edit_id);

			$this->load->view('admin/common/header', $header);
			$this->load->view('admin/common/sidebar');
			$this->load->view('admin/gallery/editcat', $editData, $ses_usrnm);
			$this->load->view('admin/common/footer');
		}
	}

	public function deleteCategory()
	{
		$r_id = $this->input->post('value');
		$ret = $this->category_model->deleteRes($r_id);
		$this->session->set_flashdata('error', 'User Enquiry Deleted Successfully.');
		echo ('['.json_encode($data).']');
	}

}