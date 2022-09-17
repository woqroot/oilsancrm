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
		$stmt = $this->db->query("SELECT u.firstName AS userFirstName, u.lastName AS userLastName, u.email AS userEmail, s.*, c.*, s.updatedAt AS sUpdatedAt, s.balance AS saleBalance,st.title AS stTitle,st.className AS stClassName FROM sale AS s
		LEFT JOIN customer AS c ON c.customerId = s.fkCustomer 
		LEFT JOIN status AS st ON st.statusId = s.fkStatus
		LEFT JOIN user AS u ON u.userId = s.fkUser
		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT s.*, c.*, s.balance AS saleBalance FROM sale AS s
		LEFT JOIN customer AS c ON c.customerId = s.fkCustomer  
		LEFT JOIN user AS u ON u.userId = s.fkUser {$whereString} {$orderBy} {$limit}");
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

	public function getSuccessfulSalesTotalOfThisMonth($userID = null, $toCurrency = 'USD')
	{
		$againText = "";
		if ($userID)
			$againText = "AND fkUser = '" . $userID . "'";

		$date1 = date("Y-m-d", strtotime('first day of this month'));
		$date2 = date("Y-m-d", strtotime('last day of this month'));

		$sales = $this->db->query("SELECT * FROM sale WHERE approvedAt BETWEEN '{$date1}' AND '{$date2}' AND fkStatus = 4 {$againText}")->result_array();


		$toCurrencyID = Helper::getCurrencyID($toCurrency);
		$currency = Helper::currency($toCurrencyID);


		return [
			'total' => $this->collectToCurrency($sales, $toCurrencyID),
			'currency' => $currency,
			'count' => count($sales)
		];

	}

	public function collectToCurrency($sales, $toCurrencyID)
	{
		$total = 0.00;
		foreach ($sales as $sale) {

			$res = Main::convertCurrency($sale['fkCurrency'], $toCurrencyID, $sale['totalPriceWithVat']);
			$total += $res;
		}
		return $total;
	}

	public function getLastSixMonthResults()
	{

		$result = [];

		$dates = [];

		for ($i = 0; $i <= 6; $i++) {

			$dates[] = [
				'year' => date("Y",strtotime('-'.$i.' month')),
				'month' => date("m",strtotime('-'.$i.' month')),
			];
		}

		foreach ($dates as $date) {

			$countSuccess = $this->db->query("SELECT * FROM sale WHERE MONTH(approvedAt) = '{$date["month"]}' AND YEAR(approvedAt) = '{$date["year"]}' AND fkStatus = 4 AND deletedAt IS NULL")->num_rows();
			$countDenies = $this->db->query("SELECT * FROM sale WHERE MONTH(approvedAt) = '{$date["month"]}' AND YEAR(approvedAt) = '{$date["year"]}' AND fkStatus = 5 AND deletedAt IS NULL")->num_rows();

			$result["labels"][] = localizeDate("M",date("Y-m-d",strtotime($date['year'].'-'.$date['month'])));
			$result["series"]["success"][] = $countSuccess;
			$result["series"]["denies"][] = $countDenies;
		}

		$result["series"]["success"] = array_reverse($result["series"]["success"]);
		$result["series"]["denies"] = array_reverse($result["series"]["denies"]);
		$result["labels"] = array_reverse($result["labels"]);

		$result["totalResultedRegs"] = $this->db->query("SELECT * FROM sale WHERE approvedAt IS NOT NULL AND fkStatus >= 4 AND deletedAt IS NULL")->num_rows();
		return $result;
	}
}
