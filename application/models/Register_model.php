<?php
class Register_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function checkmail($savedata){
		$msql 	 = "SELECT `email` FROM `user` WHERE `email` = '".$savedata['email']."'";
		$mquery  = $this->db->query($msql);
		$mresult = $mquery->row_array();
		return $mresult;
	}

	public function checkuser($savedata){
		$csql 	 = "SELECT `username` FROM `user` WHERE `username` = '".$savedata['username']."'";
		$cquery  = $this->db->query($csql);
		$cresult = $cquery->row_array();
		return $cresult;
	}

	public function checkphon($savedata){
		$psql = "SELECT `mobile_no` FROM `user` WHERE `mobile_no` = '".$savedata['mobile_no']."'";
		$pquery  = $this->db->query($psql);
		$presult = $pquery->row_array();
		return $presult;
	}

	public function addregister($savedata){
		$this->db->insert('user', $savedata);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return $insert_id;
		}
		else{
			return 0;
		}
	}

	// Contact Us ---------------------------
	public function addContact($saveContact)
	{
		$this->db->insert('contactus', $saveContact);
	}

	public function getContactDetails()
	{
		$sql = $this->db->query("SELECT * FROM `contactus`");
		return $sql->result_array();
	}

	public function deleteContact($g_id)
	{
		$sql =  $this->db->query("DELETE FROM `contactus` WHERE id = '".$g_id."' ");
	}

	// Talk to expert enquiry ---------------------------
	public function saveEnquiry($enqData)
	{
		$this->db->insert('enquiry', $enqData);
	}

	public function getAllEnquiry()
	{
		$sql = $this->db->query("SELECT * FROM `enquiry`");
		return $sql->result_array();
	}

	public function deleteEnquiry($e_id)
	{
		$sql =  $this->db->query("DELETE FROM `enquiry` WHERE id = '".$e_id."' ");
	}

}
?>