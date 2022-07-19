<?php

class DistrictModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("district");
	}


	public function search($str, int $cityID)
	{
		if (!$str) {
			$query = $this->db->query("SELECT * FROM district WHERE deletedAt IS NULL AND fkCity = '{$cityID}'");
		} else {
			$query = $this->db->query("SELECT * FROM district WHERE deletedAt IS NULL AND title LIKE '%{$str}%' AND fkCity = '{$cityID}'");
		}
		return $query->result_array();
	}
}
