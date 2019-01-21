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
	 * @method : POST
	 */
	public function add_user_post()
	{

	}

	public function Logout()
	{

	}
}
