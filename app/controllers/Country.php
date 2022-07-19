<?php

class Country extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CountryModel");
	}

	public function search()
	{
		$result = [];
		$term = $_POST["term"]["term"] ?? false;

		$all = $this->CountryModel->search($term);
		foreach ($all as $item) {
			$result[] = [
				"id" => $item["countryId"],
				"text" => $item["title"]
			];
		}
		return $this->toJson([
			"items" => $result
		]);
	}
}
