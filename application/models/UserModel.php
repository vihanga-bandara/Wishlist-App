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

 public function checkUser()
 {

 }

// public function logoutUser(){
//
// }
}
