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
		if($result->num_rows())
		{
			$password = $result->row('user_password');
			if((hash("sha256", $user_password)) === ($password)){
				return $result->row();
			} else {
				//a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3
				return false;
			}
		} else {
			return false;
		}
	}

// public function logoutUser(){
//
// }
}
