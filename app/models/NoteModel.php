<?php

class NoteModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("note");

	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT n.*,u.firstName,u.lastName FROM note AS n
		LEFT JOIN user AS u ON u.userId = n.createdBy
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT n.*,u.firstName,u.lastName FROM note AS n
		LEFT JOIN user AS u ON u.userId = n.createdBy 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
