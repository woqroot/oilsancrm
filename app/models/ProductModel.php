<?php

class ProductModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("product");
	}

	public function search($str)
	{
		return $this->db->query("SELECT * FROM product WHERE (name LIKE '%{$str}%' || productCode LIKE '%{$str}%') AND deletedAt IS NULL ")->result_array();

	}
}
