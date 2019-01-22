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
		$this->load->library('form_validation');

		//Validation
		$this->form_validation->set_rules('name', 'Name of User', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('listName', 'List Name', 'trim|required');
		$this->form_validation->set_rules('listDescription', 'List Description', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$message = array(
				"status" => false,
				"error" => $this->form_validation->error_array(),
				"message" => $this->validation_errors()
			);
			$this->response($message,REST_Controller::HTTP_NOT_FOUND);
		} else
		{
			$message = array(
				"status" => true,
				"error" => $this->form_validation->error_array(),
				"message" => $this->validation_errors()
			);
			$this->response($message,REST_Controller::HTTP_NOT_FOUND);
		}

	}

//	public function Logout()
//	{
//
//	}
}
