<?php

class Report extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SaleModel');
		$this->load->model('UserModel');
		$this->load->model('CustomerModel');
		$this->load->model('TrialProductModel');
		$this->load->model('SaleModel');
		$this->load->model('CalendarEventModel');
		$this->load->model('MissionModel');
	}

	public function general()
	{
		$data = [];
		$this->setBreadcrumb(['Raporlar', 'Genel Raporlar']);

		$this->render($data);
	}

	public function generalPost()
	{
		$dateRange = post('daterange');
		$explode = explode(" - ", $dateRange);

		$startDate = $explode[0] . " 00:00:00";
		$endDate = $explode[1] . " 23:59:59";

		$saleStatusChart = [
			'labels' => [],
			'data' => []
		];

		$missionUserChart = [
			'labels' => [],
			'data' => []
		];

		$saleStatuses = $this->StatusModel->all([], 'statusId ASC');
		foreach ($saleStatuses as $saleStatus) {
			$count = $this->SaleModel->count(['fkStatus' => $saleStatus['statusId'], 'invoiceDate >=' => $startDate, 'invoiceDate <=' => $endDate]);
			$saleStatusChart['labels'][] = $saleStatus['title'];
			$saleStatusChart['data'][] = $count;
		}

		$missionUsers = $this->UserModel->all(['fkRole' => 2], 'firstName,lastName ASC');
		foreach ($missionUsers as $missionUser) {
			$count = $this->MissionModel->count(['fkUser' => $missionUser['userId'], 'createdAt >=' => $startDate, 'createdAt <=' => $endDate]);
			$missionUserChart['labels'][] = $missionUser["firstName"] . " " . $missionUser['lastName'];
			$missionUserChart['series'][] = $count;
		}

		$salesAmount = $this->SaleModel->getSuccessfulSalesTotalOfDateRange(null, defaultCurrency(), $startDate, $endDate);


		$findTrialProductStatistics = $this->TrialProductModel->statisticsByDateRange($startDate, $endDate);

		return $this->toJson([
			'success' => true,
			'saleStatusChart' => $saleStatusChart,
			'missionUserChart' => $missionUserChart,
			'trialProducts' => $findTrialProductStatistics,
			'statics' => [
				'totalSuccessSales' => showBalance($salesAmount['total'], false),
				'totalSuccessSalesCurrency' => $salesAmount['currency'],
				'countSuccessSales' => $salesAmount['count'],
				'countEvents' => $this->CalendarEventModel->count(['createdAt >=' => $startDate, 'createdAt <=' => $endDate]),
				'countCreatedMissions' => $this->MissionModel->count(['createdAt >=' => $startDate, 'createdAt <=' => $endDate]),
				'countCompletedMissions' => $this->MissionModel->count(['completedAt >=' => $startDate, 'completedAt <=' => $endDate])
			]
		]);

	}

	public function product()
	{
		$data = [
			'users' => $this->UserModel->all(['fkRole' => 2])
		];
		$this->setBreadcrumb(['Raporlar', 'Ürün Raporları']);

		$this->render($data);
	}

	public function productPost()
	{
		$dateRange = post('daterange');
		$explode = explode(" - ", $dateRange);

		$userID = post('userID');
		$startDate = $explode[0] . " 00:00:00";
		$endDate = $explode[1] . " 23:59:59";

		$getTotalKilogramProductsDateRange = $this->SaleProductModel->getTotalKilogramProductsDateRange($startDate, $endDate, $userID);
		$getBestSellerProductKG = $this->SaleProductModel->getTheMostSalesProductByQuantity($startDate, $endDate, $userID);
		$getBestSellerProductPRICE = $this->SaleProductModel->getTheMostSalesProductByPrice($startDate, $endDate, $userID);
		$getBestSellerProductUSER = $this->SaleProductModel->getTheMostSalesProductByUser($startDate, $endDate, $userID);

		if (!isset($getBestSellerProductKG["name"])) {
			$getBestSellerProductKG = "-";
		} else {
			$getBestSellerProductKG = $getBestSellerProductKG['name'] . " (" . $getBestSellerProductKG["totalQuantity"] . " kg)";
		}

		if (!isset($getBestSellerProductUSER["firstName"])) {
			$getBestSellerProductUSER = "-";
		} else {
			$getBestSellerProductUSER = $getBestSellerProductUSER['firstName'] . " " . $getBestSellerProductUSER['lastName'] . " (" . $getBestSellerProductUSER["totalQuantity"] . " kg)";
		}

		if (!isset($getBestSellerProductPRICE["name"])) {
			$getBestSellerProductPRICE = "-";
		} else {
			$getBestSellerProductPRICE = $getBestSellerProductPRICE['name'] . " (" . $getBestSellerProductPRICE["totalPricex"] . " $)";
		}

		$productKGChart = $this->SaleProductModel->getChartDataByKG($startDate, $endDate, $userID);
		$productPRICEChart = $this->SaleProductModel->getChartDataByPRICE($startDate, $endDate, $userID);
		$productUSERChart = $this->SaleProductModel->getChartDataByUSER($startDate, $endDate, $userID);
		return $this->toJson([
			'success' => true,
			'statics' => [
				'totalKilogram' => showBalance($getTotalKilogramProductsDateRange["total"]),
				'countKilogram' => $getTotalKilogramProductsDateRange["count"],
				'bestSellerKG' => $getBestSellerProductKG,
				'bestSellerPRICE' => $getBestSellerProductPRICE,
				'bestSellerUSER' => $getBestSellerProductUSER,
			],
			'productKGChart' => $productKGChart,
			'productPRICEChart' => $productPRICEChart,
			'productUSERChart' => $productUSERChart,
		]);

	}

	public function trialProduct()
	{
		$this->load->model('ProductModel');
		$this->load->model('BrandModel');
		$products = [];

		foreach ($this->ProductModel->all() as $product) {
			$product["brandName"] = $this->BrandModel->first($product['fkBrand'])["title"] ?? null;

			$products[] = $product;
		}

		$data = [
			'users' => $this->UserModel->all(['fkRole' => 2]),
			'products' => $products
		];
		$this->setBreadcrumb(['Raporlar', 'Deneme Ürünleri']);

		$this->render($data);
	}

	public function trialProductPost()
	{
		$dateRange = post('daterange');
		$explode = explode(" - ", $dateRange);

		$userID = post('userID');
		$productID = post('productID');

		$startDate = $explode[0] . " 00:00:00";
		$endDate = $explode[1] . " 23:59:59";

		$stats = $this->TrialProductModel->allStats($startDate, $endDate, $userID, $productID);

		$staticWhere = ['startDate >= ' => $startDate, 'startDate <= ' => $endDate];

		if($userID)
			$staticWhere['fkUser'] = $userID;

		if($productID)
			$staticWhere['fkProduct'] = $productID;

		$successCount = $this->TrialProductModel->countStats(array_merge($staticWhere,['tpStatus' => 1]));
		$failCount = $this->TrialProductModel->countStats(array_merge($staticWhere,['tpStatus' => 2]));
		$pendingCount = $this->TrialProductModel->countStats(array_merge($staticWhere,['tpStatus' => 0]));

		$response = $this->toJson([
			'success' => true,
			'statics' => [
				'success' => $successCount,
				'fails' => $failCount,
				'pendings' => $pendingCount,
			],
			'data' => $stats
		]);
		return $response;

	}

}
