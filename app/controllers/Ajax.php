<?php

class Ajax extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function dashReportsOne()
	{
		$goalStats = $this->UserModel->getMonthlyGoalStats(Auth::get('userId'), defaultCurrency());

		if ($goalStats["monthlyGoal"] > 0) {
			$percent = floor($goalStats['current']['total'] / $goalStats["monthlyGoal"] * 100);
		} else {
			$percent = 0;
		}

		return $this->toJson([
			'success' => true,
			'data' => [
				'goal' => [
					'title' => 'Aylık Satış Hedefi',
					'currentSales' => number_format($goalStats['current']['total'], 2) . ' ' . $goalStats['current']['currency'],
					'total' => $goalStats["monthlyGoal"] . ' ' . $goalStats['current']['currency'],
					'percent' => $percent
				]
			],
			"showOthers" => (bool)isCan('admin')
		]);
	}

	public function dashReportsTwo()
	{
		$return = $this->SaleModel->getLastSixMonthResults();



		return $this->toJson([
			'success' => true,
			'data' => $return
		]);
	}

}
