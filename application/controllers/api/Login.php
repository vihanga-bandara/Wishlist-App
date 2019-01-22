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
		header("Access-Control-Allow-Origin: *");

		# XSS Filtering (Security)
		$data = $this->security->xss_clean($_POST);
		$this->load->library('form_validation');

		//Validation
		$this->form_validation->set_rules('name', 'Name of User', 'trim|required|is_unique[users_tbl.user_name]|alpha_numeric|max_length[20]',
			array('is_unique' => 'Username already exists. Please Enter a different Username')
		);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users_tbl.user_email]|max_length[80]',
			array('is_unique' => 'Email already exists, Please Enter a different Email')
		);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('listName', 'List Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('listDescription', 'List Description', 'trim|required|max_length[150]');

		if ($this->form_validation->run() == FALSE)
		{
			$message = array(
				"status" => false,
				"error" => $this->form_validation->error_array(),
				"message" => $this->validation_errors()
			);
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		} else
		{
			$register_data = array(
				"user_name" => $this->input->post("name", TRUE),
				"user_email" => $this->input->post("email", TRUE),
				"user_password" => hash("sha256", $this->input->post("password", TRUE)),
				"user_list_name" => $this->input->post("listName", TRUE),
				"user_list_desc" => $this->input->post("listDescription", TRUE),
			);
			$data = $this->UserModel->registerUser($register_data);
			if (!empty($data) && ($data > 0))
			{
				$message = array(
					"status" => true,
					"message" => "Successfully register user"
				);
				$this->response($message, REST_Controller::HTTP_CREATED);
			} else
			{
				$message = array(
					"status" => true,
					"error" => $this->form_validation->error_array(),
					"message" => "Unable to complete registration, try again later"
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

	}

	/**
	 * User Login
	 * -------------------------
	 * @param: username
	 * @param: password
	 * -------------------------
	 * @method : POST
	 * @url : api/user/login
	 */
	public function login_user_post()
	{
		header("Access-Control-Allow-Origin: *");

		# XSS Filtering (Security)
		$data = $this->security->xss_clean($_POST);
		$this->load->library('form_validation');

		//Validation
		$this->form_validation->set_rules('name', 'Name of User', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[80]');

		if ($this->form_validation->run() == FALSE)
		{
			$message = array(
				"status" => false,
				"error" => $this->form_validation->error_array(),
				"message" => $this->validation_errors()
			);
			$this->response($message, REST_Controller::HTTP_NOT_FOUND);
		} else
		{
			$register_data = array(
				"user_name" => $this->input->post("name", TRUE),
				"user_email" => $this->input->post("email", TRUE),
				"user_password" => hash("sha256", $this->input->post("password", TRUE)),
				"user_list_name" => $this->input->post("listName", TRUE),
				"user_list_desc" => $this->input->post("listDescription", TRUE),
			);
			$data = $this->UserModel->registerUser($register_data);
			if (!empty($data) && ($data > 0))
			{
				$message = array(
					"status" => true,
					"message" => "Successfully register user"
				);
				$this->response($message, REST_Controller::HTTP_CREATED);
			} else
			{
				$message = array(
					"status" => true,
					"error" => $this->form_validation->error_array(),
					"message" => "Unable to complete registration, try again later"
				);
				$this->response($message, REST_Controller::HTTP_NOT_FOUND);
			}
		}

	}

//	public function Logout()
//	{
//
//	}
}
