<?php

class CollectModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("collect");
	}

	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT c.*, a.name AS accountName FROM collect AS c
		LEFT JOIN account AS a ON a.accountId = c.fkAccount 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT c.*, a.name AS accountName FROM collect AS c
		LEFT JOIN account AS a ON a.accountId = c.fkAccount  {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}


}
