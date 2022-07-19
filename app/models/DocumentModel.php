<?php

class DocumentModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("document");

	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT d.*,u.firstName,u.lastName FROM document AS d
		LEFT JOIN user AS u ON u.userId = d.createdBy
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT d.*,u.firstName,u.lastName FROM document AS d
		INNER JOIN sale AS s ON s.saleId = d.fkSale
		LEFT JOIN user AS u ON u.userId = d.createdBy 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
