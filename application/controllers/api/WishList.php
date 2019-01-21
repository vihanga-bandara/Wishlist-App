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
	 * @method : POST
	 */
	public function add_item_post()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST")
		{
			$item_name = $this->input->post("item_name");
			$item_url = $this->input->post("item_url");
			$item_price = $this->input->post("item_price");
			$item_description = $this->input->post("item_description");
			$item_priority = $this->input->post("item_priority");
			$data = $this->ItemModel->addItem($item_name, $item_description, $item_url, $item_price, $item_priority);
			$this->response($data);
		}
	}

	/**
	 * Fetch an individual item data
	 * @method : GET
	 */
	public function fetch_item_get()
	{
//		if ($this->input->server("REQUEST_METHOD") == "GET")
//		{
//			$item_id = $this->input->get("item_id");
//			$data = $this->ItemModel->getItem($item_id);
//			header("Content-Type: application/json");
//			echo json_encode($data);
//		}

		$data = array('returned');
		$this->response($data);
	}

	/**
	 * Fetch all item data
	 * @method : GET
	 */
	public function fetch_all_items_get()
	{

		if ($this->input->server("REQUEST_METHOD") == "GET")
		{
			$user_id = $this->input->get("user_id");
			$data = $this->ItemModel->getAllItems($user_id);
			$this->response($data);
		}
	}

	public function update()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST")
		{
			$item_name = $this->input->post("item_name");
			$item_url = $this->input->post("item_url");
			$item_price = $this->input->post("item_price");
			$item_description = $this->input->post("item_description");
			$item_priority = $this->input->post("item_priority");
			$item_id = $this->input->post("item_id");
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
