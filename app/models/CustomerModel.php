<?php

class CustomerModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("customer");
	}


	public function list($whereString, $orderBy, $limit)
	{
		$stmt = $this->db->query("SELECT c.*, cg.title AS cgTitle FROM customer AS c
		LEFT JOIN customerGroup AS cG ON c.fkCustomerGroup = cG.customerGroupId 
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT c.*, cg.title AS cgTitle FROM customer AS c
		LEFT JOIN customerGroup AS cG ON c.fkCustomerGroup = cG.customerGroupId  {$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}

	public function search($str, $limit = 10)
	{

		$whereSearch = "deletedAt IS NULL";
		$searchableColumns = [
			"customerId",
			"name",
			"email",
			"phone",
			"shortName",
			"taxNumber"
		];

		$whereSearch .= " AND (";

		foreach ($searchableColumns as $key => $searchableColumn) {

			$whereSearch .= "$searchableColumn LIKE '%{$str}%'";
			if (array_key_last($searchableColumns) != $key) {
				$whereSearch .= " OR ";
			} else {
				$whereSearch .= ")";
			}
		}

		$stmt = $this->db->query("SELECT * FROM customer WHERE {$whereSearch}  ORDER BY customerId DESC, name ASC, shortName ASC LIMIT {$limit}");
		return $stmt->result_array();
	}

	public function increaseBalance($amount, $customerId)
	{
		return $this->db->query("UPDATE customer SET balance = balance+{$amount} WHERE customerId = {$customerId}");
	}

	public function decreaseBalance($amount, $customerId)
	{
		return $this->db->query("UPDATE customer SET balance = balance-{$amount} WHERE customerId = {$customerId}");
	}

	public function getStatistics($customerID)
	{

		$successSales = $this->SaleModel->count(['fkCustomer' => $customerID,'fkStatus' => 4]);
		$failSales = $this->SaleModel->count(['fkCustomer' => $customerID,'fkStatus' => 5]);
		$continueSales = $this->SaleModel->count(['fkCustomer' => $customerID,'fkStatus <' => '4']);


		return [
			'sales' => [
				'data' => [],
				'counts' => [
					'success' => $successSales,
					'fail' => $failSales,
					'continue' => $continueSales
				]
			]
		];
	}

	public function checkPassiveCustomers()
	{

		$sixMonthAgo = date('Y-m-d',strtotime('-6 month'));

		$query = "SELECT customerId FROM customer WHERE customerId NOT IN(SELECT fkCustomer FROM sale WHERE sale.invoiceDate > '$sixMonthAgo' AND isActive = '1')";
		$data = $this->db->query($query)->result_array();

		foreach ($data as $item) {
			$update = $this->update(['isActive' => 0],$item['customerId']);
		}
	}
}
