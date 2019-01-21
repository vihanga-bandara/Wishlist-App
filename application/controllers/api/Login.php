<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:36 PM
 */

use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


class Login extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("UserModel");
	}

	/**
	 * Register a new user
	 * -------------------------
	 * @param: name
	 * @param: email
	 * @param: password
	 * @param: list_name
	 * @param: list_description
	 * -------------------------
	 * @method : POST
	 * @url : api/user/register
	 */
	public function register_user_post()
	{
		# XSS Filtering (Security)
		$data = $this->security->xss_clean($_POST);

	}

//	public function Logout()
//	{
//
//	}
}
