<?php class Result_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `result_db`");
		return $sql->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'field' => $resultData['field'], 
			'rank' => $resultData['rank'], 
			'name' => $resultData['name'], 
			'collage' => $resultData['collage'], 
			'image_name' => $resultData['result_image'], 
			'image_title' => $resultData['image_title'], 
			'image_alt' => $resultData['image_alt'], 
			'status' => $resultData['status'], 
		);

		$this->db->insert('result_db', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

	public function getResultData($edit_id)
	{
		$query= $this->db->query("SELECT * FROM `result_db` WHERE id = '".$edit_id."' ");
		return $query->row_array();
	}

	public function updateData($updateData)
	{
		// print_r($updateData); exit;
		$sql =  $this->db->query("UPDATE `result_db` SET `field`='".$updateData['field']."', `rank`='".$updateData['rank']."', `collage`='".$updateData['collage']."', `name`='".$updateData['name']."', `image_title`='".$updateData['image_title']."', `image_alt`='".$updateData['image_alt']."' WHERE id = '".$updateData['id']."' ");
	}

	public function updateImage($updateData)
	{
		$sql =  $this->db->query("UPDATE `result_db` SET 
			`field`='".$updateData['field']."', 
			`rank`='".$updateData['rank']."', 
			`name`='".$updateData['name']."', 
			`image_title`='".$updateData['image_title']."', 
			`image_name`='".$updateData['result_image']."', 
			`image_alt`='".$updateData['image_alt']."' WHERE id = '".$updateData['id']."' ");
	}

	public function deleteRes($r_id)
	{
		$sql =  $this->db->query("DELETE FROM `result_db` WHERE id = '".$r_id."' ");
	}

	public function getneetResult($medical)
	{
		$query= $this->db->query("SELECT * FROM `result_db` WHERE field = '".$medical."' ");
		return $query->result_array();
	}

	public function getenginerResult($enginer)
	{
		$query= $this->db->query("SELECT * FROM `result_db` WHERE field = '".$enginer."' ");
		return $query->result_array();
	}

}
?>