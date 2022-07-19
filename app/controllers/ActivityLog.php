<?php

class ActivityLog extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ActivityLogModel");
	}

	public function ajax()
	{

		$searchableColumns = [
			"a.activityLogId",
			"a.explanation",
			"a.createdAt",
			"u.firstName",
			"u.lastName"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE a.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND a.fkSale = '" . post("fkSale") . "'";
		}

		if (post("fkCustomer")) {
			$whereSearch .= " AND a.fkCustomer = '" . post("fkCustomer") . "'";
		}

//		$filterCustomerGroupID = $this->input->post("customerGroupID");
//		if ($filterCustomerGroupID > 0) {
//			$whereSearch .= " AND c.fkCustomerGroup = '$filterCustomerGroupID'";
//		}

		if ($searchVal) {

			$whereSearch .= " AND (";

			foreach ($searchableColumns as $key => $searchableColumn) {

				$whereSearch .= "$searchableColumn LIKE '%{$searchVal}%'";
				if (array_key_last($searchableColumns) != $key) {
					$whereSearch .= " OR ";
				} else {
					$whereSearch .= ")";
				}
			}
		}

		if (isset($this->input->post("order")[0]["column"]) and isset($this->input->post("order")[0]["dir"])) {
			$orderBy = "ORDER BY " . $searchableColumns[$this->input->post("order")[0]["column"]] . " " . $this->input->post("order")[0]["dir"];
		} else {
			$orderBy = "ORDER BY a.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->ActivityLogModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->ActivityLogModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->ActivityLogModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			$data[] = [
				"<span data-id='" . $item["activityLogId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["activityLogId"] . "</span>",
				Logger::getTitle($item["type"]),
				showDate($item["createdAt"]),
				$item["firstName"] . " " . $item["lastName"]
			];
		}

		$response = array(
			'draw' => intval($this->input->post("draw")),
			'recordsTotal' => $countTotalRecords,
			'recordsFiltered' => $countFilteredRecords,
			'data' => $data


		);
		echo json_encode($response);

	}
}
