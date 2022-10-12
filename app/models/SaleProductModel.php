<?php

class SaleProductModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("saleProduct");
	}

	public function getTotalKilogramProductsOfThisMonth($userID = null)
	{
		$date1 = date("Y-m-d", strtotime('first day of this month')) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime('last day of this month')) . " 23:59:59";
		return $this->getTotalKilogramProductsDateRange($date1, $date2, $userID);

	}

	public function getTotalKilogramProductsDateRange($date1, $date2, $userID = 0)
	{

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT COUNT(sP.saleProductId) AS countQuantity, SUM(sP.quantity) AS totalQuantity FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale 
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      sP.fkUnit = 1 AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString}")->row_array();

		$model["totalQuantity"] = floatval($model["totalQuantity"]);

		$result = [
			'total' => $model['totalQuantity'],
			'count' => $model['countQuantity']
		];


		return $result;
	}


	public function getTheMostSalesProductByQuantity($date1, $date2, $userID = 0)
	{

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT p.*,sP.fkProduct,COUNT(sP.saleProductId) AS countQuantity, SUM(sP.quantity) AS totalQuantity FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale 
										LEFT JOIN product p on p.productId = sP.fkProduct
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      sP.fkUnit = 1 AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY sP.fkProduct ORDER BY totalQuantity DESC LIMIT 1")->row_array();

		if (isset($model["totalQuantity"])) {
			$model["totalQuantity"] = floatval($model["totalQuantity"]);

		}


		return $model;
	}

	public function getTheMostSalesProductByPrice($date1, $date2, $userID = 0)
	{

		$defaultCurrency = defaultCurrency(true);

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT p.*,sP.fkProduct,COUNT(sP.saleProductId) AS countPrice, SUM(sP.totalPriceWithVat*eP.rate) AS totalPricex FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale
    									INNER JOIN exchangeRate AS eP ON eP.fkFromCurrency = s.fkCurrency
										INNER JOIN product p on p.productId = sP.fkProduct
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      eP.fkToCurrency = '{$defaultCurrency}' AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY sP.fkProduct ORDER BY totalPricex DESC LIMIT 1000")->row_array();

		if (isset($model["totalPricex"])) {
			$model["totalPricex"] = floatval($model["totalPricex"]);
			$model["totalPricex"] = showBalance($model["totalPricex"]);
		}


		return $model;
	}

	public function getTheMostSalesProductByUser($date1, $date2, $userID = 0)
	{

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT u.firstName,u.lastName,SUM(sP.quantity) AS totalQuantity FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale 
										INNER JOIN user AS u ON u.userId = s.fkUser
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      sP.fkUnit = 1 AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY s.fkUser ORDER BY totalQuantity DESC LIMIT 1")->row_array();

		if (isset($model["totalQuantity"])) {
			$model["totalQuantity"] = floatval($model["totalQuantity"]);

		}


		return $model;
	}

	public function getChartDataByKG($date1, $date2, $userID = 0)
	{

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT p.name AS productName,sP.fkProduct,COUNT(sP.saleProductId) AS countQuantity, SUM(sP.quantity) AS totalQuantity FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale 
										LEFT JOIN product p on p.productId = sP.fkProduct
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      sP.fkUnit = 1 AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY sP.fkProduct ORDER BY totalQuantity DESC LIMIT 1000")->result_array();

		$result = [];
		foreach ($model as $item) {
			$result["labels"][] = $item["productName"];
			$result["data"][] = floatval($item["totalQuantity"]);
		}
//		if (isset($model["totalQuantity"])) {
//			$model["totalQuantity"] = floatval($model["totalQuantity"]);
//
//		}


		return $result;
	}

	public function getChartDataByPRICE($date1, $date2, $userID = 0)
	{
		$defaultCurrency = defaultCurrency(true);

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT p.name AS productName,sP.fkProduct,COUNT(sP.saleProductId) AS countPrice, SUM(sP.totalPriceWithVat*eP.rate) AS totalPricex FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale
    									INNER JOIN exchangeRate AS eP ON eP.fkFromCurrency = s.fkCurrency
										INNER JOIN product p on p.productId = sP.fkProduct
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      eP.fkToCurrency = '{$defaultCurrency}' AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY sP.fkProduct ORDER BY totalPricex DESC LIMIT 1000")->result_array();
		$result = [];
		foreach ($model as $item) {
			$result["labels"][] = $item["productName"];
			$result["data"][] = floatval($item["totalPricex"]);
		}
//		if (isset($model["totalQuantity"])) {
//			$model["totalQuantity"] = floatval($model["totalQuantity"]);
//
//		}


		return $result;
	}

	public function getChartDataByUSER($date1, $date2, $userID = 0)
	{

		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$date1 = date("Y-m-d", strtotime($date1)) . " 00:00:00";
		$date2 = date("Y-m-d", strtotime($date2)) . " 23:59:59";

		$model = $this->db->query("SELECT u.firstName,u.lastName,SUM(sP.quantity) AS totalQuantity FROM saleProduct AS sP 
    									INNER JOIN sale AS s ON s.saleId = sP.fkSale 
										INNER JOIN user AS u ON u.userId = s.fkUser
										WHERE s.deletedAt IS NULL AND 
										      sP.deletedAt IS NULL AND 
										      sP.fkUnit = 1 AND
										      s.fkStatus = 4 AND 
										      s.invoiceDate >= '{$date1}' AND 
										      s.invoiceDate <= '{$date2}' {$whereString} GROUP BY s.fkUser ORDER BY totalQuantity DESC LIMIT 1000")->result_array();

		$result = [];
		foreach ($model as $item) {
			$result["labels"][] = $item["firstName"]." ".$item["lastName"];
			$result["data"][] = floatval($item["totalQuantity"]);
		}


//		if (isset($model["totalQuantity"])) {
//			$model["totalQuantity"] = floatval($model["totalQuantity"]);
//
//		}


		return $result;
	}
}
