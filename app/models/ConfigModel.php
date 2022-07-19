<?php

class ConfigModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("config");
	}

	public function save($array)
	{
		foreach ($array as $key => $val) {
			$this->update(["value" => $val], ["name" => $key]);
			if ($this->db->affected_rows() == 0) {
				if(!$this->insert(["name" => $key, "value" => $val])){
					return false;
				}
			}
		}
		return true;

	}

	public function get(string $key)
	{
		$find = $this->db->query("SELECT value FROM config WHERE name = '{$key}'")->row_array();
		return $find ? $find["value"] : false;
	}

	public function getAll()
	{
		$response = [];

		$all = $this->db->query("SELECT name,value FROM config")->result_array();
		foreach ($all as $item) {
			$response[$item["name"]] = $item["value"];
		}
		return $response;
	}
}
