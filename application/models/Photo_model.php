<?php
class Photo_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `gallery_db`");
		return $sql->result_array();
	}

	public function getImageByCategory($category_id)
	{
		$query= $this->db->query("SELECT * FROM `gallery_db` WHERE category = '".$category_id."' ");
		return $query->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'category' => $resultData['category'], 
			'title' => $resultData['title'], 
			'image' => $resultData['pdf']
		);

		$this->db->insert('gallery_db', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

	public function addImage($data)
    {
    	// print_r($data); exit;
        $msg = '';
        $sql  = $this->db->query("INSERT INTO gallery_db (category, title, image, product_id) VALUES ('".$data['category']."','".$data['title']."', '".$data['Image_name']."','".$data['vehicle_id']."')");
        $msg = 'ins';
        return $msg;
    }

	public function deleteRes($r_id)
	{
		$sql =  $this->db->query("DELETE FROM `gallery_db` WHERE id = '".$r_id."' ");
	}

}
?>