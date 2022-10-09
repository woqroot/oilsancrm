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

		$startDate = $explode[0]." 00:00:00";
		$endDate = $explode[1]." 23:59:59";

		$saleStatusChart = [
			'labels' => [],
			'data' => []
		];

		$missionUserChart = [
			'labels' => [],
			'data' => []
		];

		$saleStatuses = $this->StatusModel->all([],'statusId ASC');
		foreach ($saleStatuses as $saleStatus) {
			$count = $this->SaleModel->count(['fkStatus' => $saleStatus['statusId'], 'invoiceDate >=' => $startDate, 'invoiceDate <=' => $endDate]);
			$saleStatusChart['labels'][] = $saleStatus['title'];
			$saleStatusChart['data'][] = $count;
		}

		$missionUsers = $this->UserModel->all(['fkRole' => 2],'firstName,lastName ASC');
		foreach ($missionUsers as $missionUser) {
			$count = $this->MissionModel->count(['fkUser' => $missionUser['userId'], 'createdAt >=' => $startDate, 'createdAt <=' => $endDate]);
			$missionUserChart['labels'][] = $missionUser["firstName"]." ".$missionUser['lastName'];
			$missionUserChart['series'][] = $count;
		}

		$salesAmount = $this->SaleModel->getSuccessfulSalesTotalOfDateRange(null, defaultCurrency(), $startDate, $endDate);



		$findTrialProductStatistics = $this->TrialProductModel->statisticsByDateRange($startDate,$endDate);

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

	}
}
