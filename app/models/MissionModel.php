<?php

class MissionModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("mission");
	}

	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT m.*, s.name AS statusName, s.className AS statusClassName, u.firstName AS userFirstName, u.lastName AS userLastName, u.email AS userEmail FROM mission AS m
		LEFT JOIN missionStatus AS s ON m.fkMissionStatus = s.missionStatusId 
		LEFT JOIN user AS u ON m.fkUser = u.userId 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT m.*, s.name AS statusName, u.firstName AS userFirstName, u.lastName AS userLastName, u.email AS userEmail FROM mission AS m
		LEFT JOIN missionStatus AS s ON m.fkMissionStatus = s.missionStatusId 
		LEFT JOIN user AS u ON m.fkUser = u.userId
		 {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
