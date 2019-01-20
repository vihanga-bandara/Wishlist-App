<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:45 AM
 */
class ItemModel extends CI_Model
{
	public function getItem()
	{
		$this->db->select("*");
		$this->db->from("wishlist");
		$query = $this->db->get();
		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1)
		{
			echo "There is no data in the database";
			exit();
		}
	}

	public function getAllItems()
	{
		$this->db->select("*");
		$this->db->from("item_tbl");
		$this->db->where('user_id', "1");
		$query = $this->db->get();
		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1)
		{
			echo "There is no data in the database";
			exit();
		}
	}

	public function addItem($item_name, $item_description, $item_url,$item_price,$item_priority)
	{
		#convert to json
//		$this->db->select("wishListItem");
//		$this->db->from("wishlist");
//		$this->db->where('userId', "1");
//		$item = $this->db->get()->row();
//		$jsonData = json_decode($item);
//		$new_poi = new stdClass();
//		$new_poi->title = $item_name;
//		$new_poi->url = $url;
//		$new_poi->price = $price;
//		$new_poi->priority = $priority;

		#update db
		$this->db->set('user_id', "1");
		$this->db->set('item_name', $item_name);
		$this->db->set('item_description', $item_description);
		$this->db->set('item_price', $item_price);
		$this->db->set('item_url', $item_url);
		$this->db->set('item_priority', $item_priority);
		$this->db->insert('item_tbl');
		return ($this->db->affected_rows() != 1) ? "Adding Item was not successful" : "Successfully Added Item";
	}

	public function updateItem()
	{
		$this->db->select("*");
		$this->db->from("wishlist");
		$query = $this->db->get();
		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1)
		{
			echo "There is no data in the database";
			exit();
		}
	}

	public function deleteItem()
	{
		$this->db->select("*");
		$this->db->from("wishlist");
		$query = $this->db->get();
		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1)
		{
			echo "There is no data in the database";
			exit();
		}
	}


}
