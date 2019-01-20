<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/20/2019
 * Time: 9:45 AM
 */
class ListModel extends CI_Model
{

	public function addList(){

	}

	public function getList()
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

	public function addItem($name, $url, $price, $priority)
	{
		#convert to json
		$this->db->select("wishListItem");
		$this->db->from("wishlist");
		$this->db->where('userId', "1");
		$item = $this->db->get()->row();
		$jsonData = json_decode($item);
		$new_poi = new stdClass();
		$new_poi->title = $name;
		$new_poi->url = $url;
		$new_poi->price = $price;
		$new_poi->priority = $priority;

		#update db
		$this->db->set('wishListItem');
		$this->db->where('userId', 2);
		$this->db->insert('wishlist');
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
