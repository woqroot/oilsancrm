<?php

class District extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("DistrictModel");
	}

	public function search()
	{
		$result = [];
		$term = $_POST["term"]["term"] ?? false;
		$cityID = $_POST["cityId"] ? $_POST["cityId"] : 0;

		$all = $this->DistrictModel->search($term, $cityID);
		foreach ($all as $item) {
			$result[] = [
				"id" => $item["districtId"],
				"text" => $item["title"]
			];
		}
		return $this->toJson([
			"items" => $result
		]);
	}
}
