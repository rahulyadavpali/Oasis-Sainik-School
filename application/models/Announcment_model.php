<?php
class Announcment_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `announcement_db`");
		return $sql->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'date' => $resultData['date'], 
			'month' => $resultData['month'], 
			'title' => $resultData['title'], 
			// 'video_link' => $resultData['video_link'], 
			'pdf_name' => $resultData['pdf']
		);

		$this->db->insert('announcement_db', $resultinfo);
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
			'video_link' => $resultData['video_link']
		);

		$this->db->insert('announcement_db', $resultinfo);
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
		$sql =  $this->db->query("DELETE FROM `announcement_db` WHERE id = '".$r_id."' ");
	}

}
?>