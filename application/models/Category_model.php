<?php
class Category_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `tb_img_category`");
		return $sql->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'title' => $resultData['title'], 
			'description' => $resultData['description'], 
			'image' => $resultData['pdf']
		);

		$this->db->insert('tb_img_category', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

    public function getData($edit_id)
	{
		$query= $this->db->query("SELECT * FROM `tb_img_category` WHERE id = '".$edit_id."' ");
		return $query->row_array();
	}

	public function addImage($data)
    {			
        $msg = '';
        $sql  = $this->db->query("INSERT INTO tb_img_category (image, product_id) VALUES ('".$data['Image_name']."','".$data['vehicle_id']."')");
        $msg = 'ins';
        return $msg;
    }

	public function deleteRes($r_id)
	{
		$sql =  $this->db->query("DELETE FROM `tb_img_category` WHERE id = '".$r_id."' ");
	}

}
?>