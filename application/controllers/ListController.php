<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:37 AM
 */
class ListController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("ItemModel");
	}

	public function index()
	{
		$this->data["names"] = $this->ItemModel->getAllItems();
		$this->load->view("ListView", $this->data);
	}

	public function add()
	{
		if ($this->input->server("REQUEST_METHOD") == "POST")
		{
			$item_name = $this->input->post("item_name");
			$item_url = $this->input->post("item_url");
			$item_price = $this->input->post("item_price");
			$item_description = $this->input->post("item_description");
			$item_priority = $this->input->post("item_priority");
			$data = $this->ItemModel->addItem($item_name, $item_description, $item_url,$item_price,$item_priority);
			echo json_encode($data);
		}
	}

	public function update()
	{

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
	}

	public function delete()
	{

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
	}

	public function Share()
	{

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
	}
}
