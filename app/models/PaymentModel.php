<?php

class PaymentModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("payment");
	}

	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT p.*, a.name AS accountName FROM payment AS p
		LEFT JOIN account AS a ON a.accountId = p.fkAccount 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT p.*, a.name AS accountName FROM payment AS p
		LEFT JOIN account AS a ON a.accountId = p.fkAccount  {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}


}
