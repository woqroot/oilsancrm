<?php

class Logger
{
	const types = [
		"ADD_SALE" => "Satış faturası oluşturuldu.",
		"EDIT_SALE" => "Fatura bilgileri düzenlendi.",
		"DELETE_SALE" => "Satış faturası silindi.",
		"ADD_COLLECT" => "Tahsilat eklendi.",
		"EDIT_COLLECT" => "Tahsilat bilgileri düzenlendi.",
		"DELETE_COLLECT" => "Tahsilat silindi."
	];

	protected static $type;
	protected static $ci;

	public function __construct()
	{
		self::$ci =& get_instance();
		self::$ci->load->model("ActivityLogModel");
		self::$ci->load->model("SaleModel");
	}

	public static function insert($type, $where = [])
	{

		$data = $where;

		$data["type"] = $type;
		$data["createdBy"] = Auth::get('userId');
		if (isset($data['fkSale']) && !isset($data['fkCustomer'])) {
			$find = self::$ci->SaleModel->first($data['fkSale']);
			if ($find) {
				$data["fkCustomer"] = $find["fkCustomer"];
			}
		}
		self::$ci->ActivityLogModel->insert($data);
	}

	public static function getTitle($key)
	{
		if (isset(self::types[$key])) {
			return self::types[$key];
		}
		return "-";
	}

}
