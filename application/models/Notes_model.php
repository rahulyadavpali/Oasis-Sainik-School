<?php
class Notes_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `importantnotes_db`");
		return $sql->result_array();
	}

	public function getidResult($less_id)
	{
		$query= $this->db->query("SELECT * FROM `importantnotes_db` WHERE stream = '".$less_id."' ");
		return $query->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'date' => $resultData['date'], 
			'month' => $resultData['month'], 
			'title' => $resultData['title'], 
			// 'video_link' => $resultData['video_link'], 
			'stream' => $resultData['stream'], 
			'pdf_name' => $resultData['pdf']
		);

		$this->db->insert('importantnotes_db', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

	public function saveResultLink($resultData)
	{
		$resultinfo = array(
			'date' => $resultData['date'], 
			'month' => $resultData['month'], 
			'title' => $resultData['title'], 
			'video_link' => $resultData['video_link'], 
			'stream' => $resultData['stream']
		);

		$this->db->insert('importantnotes_db', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

	public function deleteRes($r_id)
	{
		$sql =  $this->db->query("DELETE FROM `importantnotes_db` WHERE id = '".$r_id."' ");
	}

}
?>