<?php

class ExpenseModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("expense");

	}

	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT e.*, s.*, e.balance AS expenseBalance FROM expense AS e
		LEFT JOIN supplier AS s ON s.supplierId = e.fkSupplier 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT e.*, s.*, e.balance AS expenseBalance FROM expense AS e
		LEFT JOIN supplier AS s ON s.supplierId = e.fkSupplier   {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}

	public function increaseBalance($amount, $expenseId)
	{
		return $this->db->query("UPDATE expense SET balance = balance+{$amount} WHERE expenseId = {$expenseId}");
	}

	public function decreaseBalance($amount, $expenseId)
	{
		return $this->db->query("UPDATE expense SET balance = balance-{$amount} WHERE expenseId = {$expenseId}");
	}

	public function updateLastActionDate($expenseId)
	{
		return $this->db->query("UPDATE expense SET updatedAt = NOW() WHERE expenseId = {$expenseId}");
	}
}
