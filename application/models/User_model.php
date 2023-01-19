<?php
class User_model extends CI_Model{
	public function __construct(){$this->load->database();}

	public function usrLgn($userData){
		$lsql 	 = "SELECT `username`, `password`, `user_id` FROM `user` WHERE `username` = '".$userData['username']."'";
		$lquery  = $this->db->query($lsql);
		$lresult = $lquery->row_array();
		return $lresult;
	}

	public function get_pass($ses_usr){
		$psql 	 = "SELECT `username`, `password`, `c_pass` FROM `user` WHERE `username` = '".$ses_usr."'";
		$pquery  = $this->db->query($psql);
		$presult = $pquery->row_array();
		return $presult;
	}

	public function updatePass($newPass){
		// print_r($newPass); exit;
		$upsql = "UPDATE `user` SET `password`= '".$newPass['password']."',`c_pass`= '".$newPass['c_pass']."' WHERE `username` = '".$newPass['username']."'";
		$upresult = $this->db->query($upsql);
		return $upresult;
	}
}
?>