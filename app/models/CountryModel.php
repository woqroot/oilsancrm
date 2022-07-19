<?php

class CountryModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("country");
	}


	public function search($str)
	{
		if (!$str) {
			$query = $this->db->query("SELECT * FROM country WHERE deletedAt IS NULL");
		} else {
			$query = $this->db->query("SELECT * FROM country WHERE deletedAt IS NULL AND title LIKE '%{$str}%'");
		}
		return $query->result_array();
	}
}
