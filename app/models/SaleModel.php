<?php

class SaleModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("sale");

	}

	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT s.*, c.*, s.balance AS saleBalance,st.title AS stTitle,st.className AS stClassName FROM sale AS s
		LEFT JOIN customer AS c ON c.customerId = s.fkCustomer 
		LEFT JOIN status AS st ON st.statusId = s.fkStatus
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT s.*, c.*, s.balance AS saleBalance FROM sale AS s
		LEFT JOIN customer AS c ON c.customerId = s.fkCustomer   {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}

	public function increaseBalance($amount, $saleId)
	{
		return $this->db->query("UPDATE sale SET balance = balance+{$amount} WHERE saleId = {$saleId}");
	}

	public function decreaseBalance($amount, $saleId)
	{
		return $this->db->query("UPDATE sale SET balance = balance-{$amount} WHERE saleId = {$saleId}");
	}
}
