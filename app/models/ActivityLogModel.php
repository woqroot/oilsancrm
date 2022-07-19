<?php

class ActivityLogModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("activityLog");
	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT a.*,u.firstName,u.lastName FROM activityLog AS a
		LEFT JOIN user AS u ON u.userId = a.createdBy
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT a.*,u.firstName,u.lastName FROM activityLog AS a
		LEFT JOIN user AS u ON u.userId = a.createdBy 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
