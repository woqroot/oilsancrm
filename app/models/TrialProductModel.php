<?php

class TrialProductModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("trialProduct");
	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT tp.*,u.firstName,u.lastName,p.name,un.name AS unitName FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy
		LEFT JOIN product AS p ON p.productId = tp.fkProduct
		LEFT JOIN unit AS un ON un.unitId = tp.fkUnit

		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT tp.*,u.firstName,u.lastName,p.name FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy 
    LEFT JOIN product AS p ON p.productId = tp.fkProduct
        LEFT JOIN unit AS un ON un.unitId = tp.fkUnit

		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
