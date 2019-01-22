<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:37 AM
 */

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';


class WishList extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("ItemModel");
	}

	/**
	 * Add a new item
	 * -------------------------
	 * @param: username
	 * @param: password
	 * -------------------------
	 * @method : POST
	 * @url : api/list/item
	 */
	public function add_item_post()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST")
		{
			//Validation
			$this->form_validation->set_rules('item_id', 'Item id', 'trim|required');
			$this->form_validation->set_rules('item_name', 'Item name', 'trim|required');
			$this->form_validation->set_rules('item_url', 'Item URL', 'trim|required');
			$this->form_validation->set_rules('item_price', 'Item price', 'trim|required');
			$this->form_validation->set_rules('item_description', 'Item description', 'trim|required');
			$this->form_validation->set_rules('item_priority', 'Item priority', 'trim|required');

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
				$postData = array(
					"item_id" => $this->input->post("item_id", TRUE),
					"item_name" => $this->input->post("item_name", TRUE),
					"item_url" => $this->input->post("item_url", TRUE),
					"item_price" => $this->input->post("item_price", TRUE),
					"item_description" => $this->input->post("item_description", TRUE),
					"item_priority" => $this->input->post("item_priority", TRUE),
				);

				$data = $this->ItemModel->addItem($postData);
				if (!empty($data) && ($data > 0))
				{
					$message = array(
						"status" => true,
						"message" => "Successfully added an item"
					);
					$this->response($message, REST_Controller::HTTP_CREATED);
				} else
				{
					$message = array(
						"status" => false,
						"error" => $this->form_validation->error_array(),
						"message" => "Unable to add an item"
					);
					$this->response($message, REST_Controller::HTTP_NOT_FOUND);
				}
			}
		}
	}

	/**
	 * Fetch an existing item
	 * -------------------------
	 * @param: item_id
	 * -------------------------
	 * @method : GET
	 * @url : api/item/add
	 */
	public function fetch_item_get()
	{
		if ($this->input->server("REQUEST_METHOD") == "GET")
		{
			$last = $this->uri->total_segments();
			$item_id = $this->uri->segment($last);
			$data = $this->ItemModel->getItem($item_id);
			$this->response($data);
		}

		$data = array('returned');
		$this->response($data);
	}

	/**
	 * Fetch all existing items
	 * -------------------------
	 * @method : GET
	 * @url : api/list/item
	 */
	public function fetch_all_items_get()
	{
		if ($this->input->server("REQUEST_METHOD") == "GET")
		{
			$data = $this->ItemModel->getAllItems();
			$this->response($data);
		}
	}

	/**
	 * Update existing item
	 * -------------------------
	 * @param: item_id
	 * @param: item_name
	 * @param: item_url
	 * @param: item_price
	 * @param: item_description
	 * @param: item_priority
	 * -------------------------
	 * @method : PUT
	 * @url : api/item/add
	 */
	public function update_item_put()
	{
		if ($this->input->server("REQUEST_METHOD") == "PUT")
		{
			$last = $this->uri->total_segments();
			$item_id = $this->uri->segment($last);
			$item_name = $this->input->put("item_name");
			$item_url = $this->input->put("item_url");
			$item_price = $this->input->put("item_price");
			$item_description = $this->input->put("item_description");
			$item_priority = $this->input->put("item_priority");
			$data = $this->ItemModel->updateItem($item_name, $item_description, $item_url, $item_price, $item_priority, $item_id);
			echo json_encode($data);
		}
	}

//	public function delete()
//	{
//		if ($this->input->server("REQUEST_METHOD") == "POST")
//		{
//			$item_id = $this->input->post("item_id");
//			$data = $this->ItemModel->deleteItem($item_id);
//			echo json_encode($data);
//		}
//	}

//	public function Share()
//	{
//
//		if ($this->input->server("REQUEST_METHOD") == "POST")
//		{
//			$item_name = $this->input->post("item_name");
//			$item_url = $this->input->post("item_url");
//			$item_price = $this->input->post("item_price");
//			$item_priority = $this->input->post("item_priority");
//
//			$this->load->model("ListModel");
//			$this->data["names"] = $this->ListModel->addList();
//		}
//	}
}
