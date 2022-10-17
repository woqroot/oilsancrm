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

		$stmt = $this->db->query("SELECT tp.*,u.firstName AS userFirstName,u.lastName AS userLastName,p.name,un.name AS unitName,c.name AS customerName,s.invoiceNumber,u.email AS userEmail FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy
		LEFT JOIN product AS p ON p.productId = tp.fkProduct
		LEFT JOIN unit AS un ON un.unitId = tp.fkUnit
		LEFT JOIN customer AS c ON c.customerId = tp.fkCustomer
		LEFT JOIN sale AS s ON s.saleId = tp.fkSale

		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT tp.*,u.firstName,u.lastName,p.name FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy 
    	LEFT JOIN product AS p ON p.productId = tp.fkProduct
        LEFT JOIN unit AS un ON un.unitId = tp.fkUnit
		LEFT JOIN customer AS c ON c.customerId = tp.fkCustomer
		LEFT JOIN sale AS s ON s.saleId = tp.fkSale
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}

	public function statisticsByDateRange($startDate, $endDate, $userID = 0)
	{
		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}

		$startDate = date("Y-m-d", strtotime($startDate)) . " 00:00:00";
		$endDate = date("Y-m-d", strtotime($endDate)) . " 23:59:59";

		$result = [
			'total' => [
				'count' => 0,
				'amount' => 0.00
			],
			'completeds' => [
				'count' => 0,
				'amount' => 0.00
			],
			'progress' => [
				'percent' => 0
			]
		];

		$query = $this->db->query("SELECT * FROM trialProduct tP 
    				INNER JOIN sale s ON s.saleId = tP.fkSale 
					WHERE s.deletedAt IS NULL AND 
					      tP.deletedAt IS NULL AND 
					      tP.startDate >= '{$startDate}' AND 
					      tP.startDate <= '{$endDate}'
					      " . $whereString)->result_array();


		foreach ($query as $item) {
			$result['total']['count']++;
			$result['total']['amount'] += $item["amount"];

			if ($item['tpStatus'] != 0) {

				$result['completeds']['count']++;
				$result['completeds']['amount'] += $item["amount"];

			}
		}


		$result['progress']['percent'] = number_format($result['completeds']['amount'] > 0 ? ($result['completeds']['amount'] / $result['total']['amount']) * 100 : 0, 2);

		return $result;
	}

	public function allStats($startDate, $endDate, $userID = 0, $productID = 0)
	{
		$whereString = "";
		if ($userID) {
			$whereString .= " AND s.fkUser = '" . $userID . "'";
		}
		if ($productID) {
			$whereString .= " AND tP.fkProduct = '" . $productID . "'";
		}

		$startDate = date("Y-m-d", strtotime($startDate)) . " 00:00:00";
		$endDate = date("Y-m-d", strtotime($endDate)) . " 23:59:59";

		$result = [
			"all" => [],
			"general" => [
				'total' => [
					'count' => 0,
					'amount' => 0.00
				],
				'completeds' => [
					'count' => 0,
					'amount' => 0.00
				],
				'progress' => [
					'percent' => 0
				]
			]
		];


		$query = $this->db->query("SELECT * FROM trialProduct tP 
    				INNER JOIN sale s ON s.saleId = tP.fkSale 
					WHERE s.deletedAt IS NULL AND 
					      tP.deletedAt IS NULL AND 
					      tP.startDate >= '{$startDate}' AND 
					      tP.startDate <= '{$endDate}'
					      " . $whereString)->result_array();


		foreach ($query as $item) {
			$result["general"]['total']['count']++;
			$result["general"]['total']['amount'] += $item["amount"];

			if ($item['tpStatus'] != 0) {

				$result["general"]['completeds']['count']++;
				$result["general"]['completeds']['amount'] += $item["amount"];

			}
		}


		$result["general"]['progress']['percent'] = number_format($result["general"]['completeds']['amount'] > 0 ? ($result["general"]['completeds']['amount'] / $result["general"]['total']['amount']) * 100 : 0, 2);

		$allQuery = "SELECT p.name,p.productId,b.title,b.brandId,COUNT(trialProductId) AS totalCount, SUM(tp.amount) AS totalKilogram FROM trialproduct tp 
    				JOIN sale s ON s.saleId = tp.fkSale 
    				JOIN product p ON p.productId = tp.fkProduct
					JOIN brand b on p.fkBrand = b.brandId
					WHERE tp.deletedAt IS NULL AND
					tP.startDate >= '{$startDate}' AND 
					tP.startDate <= '{$endDate}'
					" . $whereString . "
					GROUP BY tp.fkProduct 
					ORDER BY totalKilogram DESC";

		$productChart = $this->db->query($allQuery)->result_array();
		$result["productChart"] = [
			'labels' => [],
			'data' => []
		];
		foreach ($productChart as $item) {
			$result["productChart"]["labels"][] = $item["name"];
			$result["productChart"]["data"][] = intval($item["totalKilogram"], 0);
		}
		return $result;
	}

	public function countStats($whereTh)
	{
		$where = [];

		$where['sale.deletedAt'] = null;
		$where['trialProduct.deletedAt'] = null;
		$where = array_merge($where,$whereTh);
		return $this->db->select($this->primaryKey)
			->join('sale', 'sale.saleId = trialProduct.fkSale')
			->from($this->tableName)
			->where($where)
			->get()
			->num_rows();
	}

}
