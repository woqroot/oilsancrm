<?php

class Main
{
	protected static $instance;
	protected static $units;
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


			$units = self::$instance->UnitModel->all();
			foreach ($units as $unit) {
				self::$units[$unit["unitId"]] = $unit;
			}


		}

	}

	public static function unit($unitID, $returnName = true)
	{
		if($returnName) return isset(self::$units[$unitID]) ? self::$units[$unitID]["name"] : false;
		return isset(self::$units[$unitID]) ? self::$units[$unitID] : false;
	}

	public static function convertCurrency($from,$to)
	{

	}
}
