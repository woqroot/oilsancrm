<?php

class SupplierModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("supplier");
	}


	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT s.* FROM supplier AS s
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT s.* FROM supplier AS s  {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}

	public function search($str, $limit = 10)
	{

		$whereSearch = "deletedAt IS NULL";
		$searchableColumns = [
			"supplierId",
			"name",
			"email",
			"phone",
			"shortName",
			"taxNumber"
		];

		$whereSearch .= " AND (";

		foreach ($searchableColumns as $key => $searchableColumn) {

			$whereSearch .= "$searchableColumn LIKE '%{$str}%'";
			if (array_key_last($searchableColumns) != $key) {
				$whereSearch .= " OR ";
			} else {
				$whereSearch .= ")";
			}
		}

		$stmt = $this->db->query("SELECT * FROM supplier WHERE {$whereSearch}  ORDER BY supplierId DESC, name ASC, shortName ASC LIMIT {$limit}");
		return $stmt->result_array();
	}

	public function increaseBalance($amount, $supplierId)
	{
		return $this->db->query("UPDATE supplier SET balance = balance+{$amount} WHERE supplierId = {$supplierId}");
	}

	public function decreaseBalance($amount, $supplierId)
	{
		return $this->db->query("UPDATE supplier SET balance = balance-{$amount} WHERE supplierId = {$supplierId}");
	}
}
