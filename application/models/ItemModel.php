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

	public function getAllItems($user_id)
	{
		$this->db->select("*");
		$this->db->where("user_id", $user_id);
		// fetch the list according to priority
		$this->db->order_by("item_priority", "asc");
		$this->db->from($this->item_tbl_name);
		$query = $this->db->get();
//		return $query->result();
		$responeArr = Array();
		foreach($query->result() as $row){
			$arr = array(
				"id"=>$row->item_id,
				"item_id" => $row->item_id,
				"item_name" => $row->item_name,
				"item_price" => $row->item_price,
				"item_description" => $row->item_description,
				"item_url" => $row->item_url,
				"item_priority" => $row->item_priority,
				"item_image" => $row->item_image,
			);
			array_push($responeArr,$arr);
		}
		return $responeArr;

	}

	public function addItem($postData)
	{
		$this->db->insert($this->item_tbl_name, $postData);
//		return $this->db->insert_id();
		return $this->db->insert_id();
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
		return ($this->db->affected_rows() >= 1) ? "Deleted Successfully" : false;
	}
}
