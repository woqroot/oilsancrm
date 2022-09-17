<?php

class SaleExpense extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("SaleModel");
		$this->load->model("SaleExpenseModel");
	}

	public function ajax()
	{

		$searchableColumns = [
			"sE.saleExpenseId",
			"sE.title",
			"sE.createdAt",
			"u.firstName"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE sE.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND sE.fkSale = '" . post("fkSale") . "'";
		}
		if (post("fkExpense")) {
			$whereSearch .= " AND sE.fkExpense = '" . post("fkExpense") . "'";
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
			$orderBy = "ORDER BY sE.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->SaleExpenseModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->SaleExpenseModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->SaleExpenseModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			$data[] = [
				"<span data-id='" . $item["saleExpenseId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["saleExpenseId"] . "</span>",
				$item["title"],
				showBalance($item["totalPrice"],$item['fkCurrency']),
				showDate($item["createdAt"]),
				$item["firstName"] . " " . $item["lastName"],
				'<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
					
							<button type="button" data-id="' . $item['saleExpenseId'] . '" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary editSaleExpenseButton">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-edit"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
					
					</div>
					<div class="ms-2">
						<button type="button" data-id="' . $item['saleExpenseId'] . '" class="' . hideByPerm('admin') . ' btn btn-sm btn-icon btn-light btn-active-light-danger deleteSaleExpense" >
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
		$action = post("action");
		switch ($action) {
			case "ADD":

				$sale = $this->SaleModel->first(post('saleID'));
				if(!$sale)
					return $this->response();

				$data = [
					'title' => post('title'),
					'explanation' => post("explanation"),
					'totalPrice' => clearDecimal(post('totalPrice')),
					'createdBy' => Auth::get('userId'),
					'fkSale' => post('saleID') ?: null,
					'fkCustomer' => post('customerID') ?: null,
					'fkCurrency' => $sale['fkCurrency']
				];

				if ($this->SaleExpenseModel->insert($data)) {
					return $this->response(1, "Masraf kaydınız başarıyla kaydedildi!");
				}
				return $this->response();

				break;
			case "EDIT":
				$id = post('saleExpenseID');
				$find = $this->SaleExpenseModel->first($id);
				if (!$find) return $this->response();
				if ($this->SaleExpenseModel->update(['title' => post('title'),'explanation' => post('explanation'),'totalPrice' => clearDecimal(post('totalPrice'))],$id)){
					return $this->response(1,"Değişiklikler başarıyla kaydedildi.");
				}
				return $this->response();
				break;
			case "FIND":
				$id = post('id');

				$find = $this->SaleExpenseModel->first($id);
				if ($find) {
				$find['totalPrice'] = showBalance($find['totalPrice'],false);
						return $this->toJson([
						'status' => 1,
						'data' => $find
					]);
				}
				return $this->response();
				break;
			case "DELETE":
				$id = post("id");
				$delete = $this->SaleExpenseModel->delete($id);
				if ($delete) return $this->response(1, "Masraf kaydı başarıyla silindi!");
				return $this->response();
				break;
		}
	}
}
