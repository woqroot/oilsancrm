<?php

class Document extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("SaleModel");
		$this->load->model("DocumentModel");
	}

	public function ajax()
	{

		$searchableColumns = [
			"d.documentId",
			"d.name",
			"d.createdAt",
			"u.firstName",
			"u.lastName"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE d.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND d.fkSale = '" . post("fkSale") . "'";
		}
		if (post("fkExpense")) {
			$whereSearch .= " AND d.fkExpense = '" . post("fkExpense") . "'";
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
			$orderBy = "ORDER BY d.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->DocumentModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->DocumentModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->DocumentModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			$data[] = [
				"<span data-id='" . $item["documentId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["documentId"] . "</span>",
				$item["name"],
				showDate($item["createdAt"]),
				$item["firstName"] . " " . $item["lastName"],
				'<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
						<a download href="' . uploads_url($item["document"]) . '">
							<button type="button" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-download"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
						</a>
					</div>
					<div class="ms-2">
						<button type="button" data-id="' . $item['documentId'] . '" class="btn btn-sm btn-icon btn-light btn-active-light-danger deleteDocument ' . hideByPerm("delete-document") . '" >
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

				if (!isset($_FILES["document"]["tmp_name"]) || !$_FILES["document"]["tmp_name"]) return $this->response();
				if (!post("name")) return $this->response(0, "Geçerli bir dosya adı girmelisiniz.");
				$data = [
					'name' => post('name'),
					'createdBy' => Auth::get("userId")
				];
				$data["fkCustomer"] = post("fkCustomer") ?: null;
				$data["fkSupplier"] = post("fkSupplier") ?: null;
				$data["fkSale"] = post("fkSale") ?: null;
				$data["fkExpense"] = post("fkExpense") ?: null;


				$fileName = upload_file("document", "sale-documents");
				if (!$fileName) return $this->response(0, "Dosya yüklenirken bir hata meydana geldi.");

				$data["document"] = $fileName;
				$success = $this->DocumentModel->insert($data);
				if ($success) {
					Logger::insert("ADD_DOCUMENT", ["fkSale" => $data["fkSale"], "fkDocument" => $success["documentId"]]);

					return $this->response(1, "Doküman başarıyla yüklendi!");
				}
				return $this->response(0, "Yükleme sırasında bir hata oluştu.");


				break;
			case "DELETE":
				$id = post("id");
				$find = $this->DocumentModel->first($id);
				if(!$find){
					return $this->response(0,"Doküman bulunamadı!");
				}
				$delete = $this->DocumentModel->delete($id);
				if ($delete){
					Logger::insert("ADD_DOCUMENT", ["fkSale" => $find["fkSale"], "fkDocument" => $find["documentId"]]);
					return $this->response(1, "Doküman başarıyla silindi!");
				}
				return $this->response();
				break;
		}
	}
}
