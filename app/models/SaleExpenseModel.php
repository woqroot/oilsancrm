<?php

class SaleExpenseModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("saleExpense");

	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT sE.*,u.firstName,u.lastName,s.invoiceNumber FROM saleExpense AS sE
		LEFT JOIN user AS u ON u.userId = sE.createdBy
		LEFT JOIN sale AS s ON s.saleId = sE.fkSale
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT sE.*,u.firstName,u.lastName FROM saleExpense AS sE
		LEFT JOIN user AS u ON u.userId = sE.createdBy 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
