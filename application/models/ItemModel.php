<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:45 AM
 */
class ItemModel extends CI_Model
{
	private $item_tbl_name = "item_tbl";

	public function getSingleItem($item_id)
	{
		$this->db->select("*");
		$this->db->from($this->item_tbl_name);
		$this->db->where("item_id", $item_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getAllItems()
	{
		$this->db->select("*");
		$this->db->from($this->item_tbl_name);
		$query = $this->db->get();
		return $query->result();
	}

	public function addItem($postData)
	{
		$this->db->insert($this->item_tbl_name, $postData);
//		return $this->db->insert_id();
		return $postData;
	}

	public function updateItem($item_name, $item_url, $item_price, $item_description, $item_priority, $item_id)
	{
		$updateData = array(
			"item_name" => $item_name,
			"item_url" => $item_url,
			"item_price" => $item_price,
			"item_description" => $item_description,
			"item_priority" => $item_priority
		);
		$this->db->where("item_id", $item_id);
		$this->db->update($this->item_tbl_name, $updateData);
		return ($this->db->affected_rows() >= 1) ? "Updating Item was successful" : false;
	}

	public function deleteItem($item_id)
	{
		$this->db->where("item_id", $item_id);
		$this->db->delete($this->item_tbl_name);
		return ($this->db->affected_rows() >= 1) ? "Deleted Successfully" : "Item Not Found";
	}
}
