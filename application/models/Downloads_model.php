<?php
class Downloads_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function getAllResult()
	{
		$sql = $this->db->query("SELECT * FROM `tb_downloads`");
		return $sql->result_array();
	}

	public function saveResultData($resultData)
	{
		$resultinfo = array(
			'title' => $resultData['title'], 
			'links' => $resultData['links'],
		);

		$this->db->insert('tb_downloads', $resultinfo);
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
			'title' => $resultData['title'], 
			'links' => $resultData['links'],
		);

		$this->db->insert('tb_downloads', $resultinfo);
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
		$sql =  $this->db->query("DELETE FROM `tb_downloads` WHERE id = '".$r_id."' ");
	}

}
?>