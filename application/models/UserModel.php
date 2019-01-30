<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:30 PM
 */

class UserModel extends CI_Model
{
	private $user = "users_tbl";

	public function registerUser($register_data)
	{
		$this->db->insert($this->user, $register_data);
		return $this->db->insert_id();
	}

	public function loginUser($user_name, $user_password)
	{
		$this->db->select("");
		$this->db->from($this->user);
		// Use either user name or email
		$this->db->where("user_name", $user_name);
		$this->db->or_where("user_email", $user_name);
		$result = $this->db->get();
		if ($result->num_rows())
		{
			$password = $result->row('user_password');
			if ((hash("sha256", $user_password)) === ($password))
			{
				return $result->row();
			} else
			{
				return false;
			}
		} else
		{
			return false;
		}
	}

	public function activateUser($user_id){
		$newStatus = array('user_active' => 1);
		$this->db->where("user_id", $user_id);
		$this->db->update($this->user, $newStatus);
	}

	public function getSingleUserData($user_id){
		$this->db->select("user_id,user_name,user_email,user_list_name,user_list_description");
		$this->db->from($this->user);
		$this->db->where("user_id", $user_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function updateUser($user_list_name, $user_list_description,$user_id){
		$updateData = array(
			"user_list_name" => $user_list_name,
			"user_list_description" => $user_list_description
		);
		$this->db->where("user_id", $user_id);
		$this->db->update($this->user, $updateData);
		$updated_status = $this->db->affected_rows();
		if($updated_status)
		{
			return true;
		}
		else {
			return false;
		}
	}

 public function logoutUser(){
 	session_unset();
 }
}
