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
			# XSS Filtering (Security)
			$data = $this->security->xss_clean($_POST);

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
				$this->response($message, REST_Controller::HTTP_BA);
			} else
			{
				$postData = array(
					"item_id" => $this->post("item_id", TRUE),
					"item_name" => $this->post("item_name", TRUE),
					"item_url" => $this->post("item_url", TRUE),
					"item_price" => $this->post("item_price", TRUE),
					"item_description" => $this->post("item_description", TRUE),
					"item_priority" => $this->post("item_priority", TRUE),
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
					$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
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
	 * @url : api/list/item/{item_id}
	 */
	public function fetch_item_get()
	{
		if ($this->input->server("REQUEST_METHOD") == "GET")
		{
			# XSS Filtering (Security)
			$data = $this->security->xss_clean($_POST);

			$last = $this->uri->total_segments();
			$item_id = $this->uri->segment($last);
			$itemData = $this->ItemModel->getSingleItem($item_id);
			if (!empty($itemData) AND $itemData != false)
			{
				$itemObj = array(
					"item_id" => $itemData->item_id,
					"item_name" => $itemData->item_name,
					"item_url" => $itemData->item_url,
					"item_price" => $itemData->item_price,
					"item_description" => $itemData->item_description,
					"item_priority" => $itemData->item_priority
				);
				$message = array(
					"status" => true,
					"data" => $itemObj,
					"message" => "Item successfully fetched"
				);
				$this->response($message, REST_Controller::HTTP_OK);
			} else
			{
				$message = array(
					"status" => false,
					"error" => $this->form_validation->error_array(),
					"message" => "Error when fetching item"
				);
				$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
		}
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
	 * @param: item_name
	 * @param: item_url
	 * @param: item_price
	 * @param: item_description
	 * @param: item_priority
	 * -------------------------
	 * @method : PUT
	 * @url : api/list/item/{item_id}
	 */
	public function update_item_put()
	{
		if ($this->input->server("REQUEST_METHOD") == "PUT")
		{

			$last = $this->uri->total_segments();
			$item_id = $this->uri->segment($last);

			$item_name = $this->put("item_name", TRUE);
			$item_url = $this->put("item_url", TRUE);
			$item_price = $this->put("item_price", TRUE);
			$item_description = $this->put("item_description", TRUE);
			$item_priority = $this->put("item_priority", TRUE);


			$response = $this->ItemModel->updateItem($item_name, $item_url, $item_price, $item_description, $item_priority, $item_id);
			if (!empty($response) AND $response != false)
			{
				$responseData = array(
					"item_id" => $item_id,
					"item_name" => $item_name,
				);
				$message = array(
					"status" => true,
					"data" => $responseData,
					"message" => "Item updated successfully"
				);
				$this->response($message, REST_Controller::HTTP_OK);
			} else
			{
				$message = array(
					"status" => false,
					"error" => $this->form_validation->error_array(),
					"message" => "Error when updating item or item is already up-to-date"
				);
				$this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	/**
	 * Delete existing item
	 * -------------------------
	 * @method : DELETE
	 * @url : api/list/item/{item_id}
	 */
	public function item_delete()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST")
		{
			$item_id = $this->delete("item_id");
			$data = $this->ItemModel->deleteItem($item_id);
			echo json_encode($data);
		}
	}

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
