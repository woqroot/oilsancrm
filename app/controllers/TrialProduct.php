<?php

class TrialProduct extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("TrialProductModel");
		$this->load->model("SaleModel");
		$this->load->model("CustomerModel");
	}

	public function ajax()
	{

		$searchableColumns = [
			"tp.trialProductId",
			"p.name",
			"p.startDate"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE tp.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND tp.fkSale = '" . post("fkSale") . "'";
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
			$orderBy = "ORDER BY tp.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->TrialProductModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->TrialProductModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->TrialProductModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			$data[] = [
				"<span data-id='" . $item["trialProductId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["trialProductId"] . "</span>",
				"<span class='badge badge-light-primary'>".$item["amount"]." ".$item["unitName"]."</span>"." ".$item["name"],
				localizeDate("d M Y l",$item["startDate"]),
				"x",
				'<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
					
							<button type="button" data-id="' . $item['trialProductId'] . '" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary editTrialProductButton">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-edit"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
					
					</div>
					<div class="ms-2">
						<button type="button" data-id="' . $item['trialProductId'] . '" class="btn btn-sm btn-icon btn-light btn-active-light-danger deleteTrialProduct" >
							<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
							<span class="svg-icon svg-icon-5 m-0">
								<i class="fa fa-trash"></i>
							</span>
							<!--end::Svg Icon-->
						</button>
					</div>
				</div>'
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


	public function action()
	{
		switch (post("action")) {
			case "ADD":

				break;
		}
	}
}
