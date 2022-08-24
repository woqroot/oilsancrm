<?php

class Main
{
	protected static $instance;
	protected static $units;
	protected static $statuses;
	protected static $exchangeRates = [
		[
			"from" => "USD",
			"to" => "TRY"
		]
	];


	public function __construct()
	{

		if (isLogin()) {

			self::$instance =& get_instance();
			self::$instance->load->model("UnitModel");
			self::$instance->load->model("StatusModel");


			$units = self::$instance->UnitModel->all();
			foreach ($units as $unit) {
				self::$units[$unit["unitId"]] = $unit;
			}

			$statuses = self::$instance->StatusModel->all();
			foreach ($statuses as $status) {
				self::$statuses[$status["statusId"]] = $status;
			}


		}

	}

	public static function unit($unitID, $returnName = true)
	{
		if ($returnName) return isset(self::$units[$unitID]) ? self::$units[$unitID]["name"] : false;
		return isset(self::$units[$unitID]) ? self::$units[$unitID] : false;
	}

	public static function convertCurrency($from, $to)
	{

	}

	public static function getStatus($statusId)
	{
		if (isset(self::$statuses[$statusId])) {
			return self::$statuses[$statusId];
		}
		return false;
	}
}
