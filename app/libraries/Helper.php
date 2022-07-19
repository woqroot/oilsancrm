<?php

class Helper
{
	protected static $ci;
	protected static $currencies = [];

	public function __construct()
	{
		self::$ci =& get_instance();
		self::$ci->load->model("CurrencyModel");
		self::Load();
	}

	private static function Load()
	{
		self::loadCurrencies();
	}

	private static function loadCurrencies()
	{
		foreach (self::$ci->CurrencyModel->all() as $item) {
			self::$currencies[$item["currencyId"]] = $item;
		}
		return;
	}

	public static function currency($idOrName, $symbol = true)
	{
		if (!isset(self::$currencies[$idOrName])) return null;

		return $symbol ? self::$currencies[$idOrName]["symbol"] : self::$currencies[$idOrName];
	}

}
