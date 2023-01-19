<?php class Testimonial_model extends CI_Model
{
	public function __construct(){$this->load->database();}

	public function addReview($reviewData)
	{
		$resultinfo = array(
			'name' => $reviewData['name'], 
			'message' => $reviewData['message'], 
			'review_img' => $reviewData['review_image'], 
			'review_img_title' => $reviewData['review_title'], 
			'status' => $reviewData['status'], 
		);

		$this->db->insert('testimonial_db', $resultinfo);
		$image_id = $this->db->insert_id();
		if($image_id){
			return $image_id;
		}
		else{
			return 0;
		}
	}

	public function getAllReview()
	{
		$sql = $this->db->query("SELECT * FROM `testimonial_db`");
		return $sql->result_array();
	}

	public function getEnrollData($edit_id)
	{
		$query= $this->db->query("SELECT * FROM `testimonial_db` WHERE id = '".$edit_id."' ");
		return $query->row_array();
	}

	public function updateData($updateData)
	{
		$sql =  $this->db->query("UPDATE `testimonial_db` SET `name`='".$updateData['name']."', `message`='".$updateData['message']."', `review_img_title`='".$updateData['review_img_title']."' WHERE id = '".$updateData['id']."' ");
	}

	public function updateImage($updateData)
	{
		$sql =  $this->db->query("UPDATE `testimonial_db` SET 
			`name`='".$updateData['name']."',  
			`message`='".$updateData['message']."', 
			`review_img`='".$updateData['review_image']."', 
			`review_img_title`='".$updateData['review_img_title']."' WHERE id = '".$updateData['id']."' ");
	}

	public function deleteReview($t_id)
	{
		$sql =  $this->db->query("DELETE FROM `testimonial_db` WHERE id = '".$t_id."' ");
	}

}
?>