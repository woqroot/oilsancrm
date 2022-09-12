<?php

class Note extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("SaleModel");
		$this->load->model("NoteModel");
	}

	public function ajax()
	{

		$searchableColumns = [
			"n.noteId",
			"n.explanation",
			"n.createdAt",
			"u.firstName",
			"u.lastName"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE n.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND n.fkSale = '" . post("fkSale") . "'";
		}
		if (post("fkExpense")) {
			$whereSearch .= " AND n.fkExpense = '" . post("fkExpense") . "'";
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
			$orderBy = "ORDER BY n.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->NoteModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->NoteModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->NoteModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			$data[] = [
				"<span data-id='" . $item["noteId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["noteId"] . "</span>",
				$item["explanation"],
				showDate($item["createdAt"]),
				$item["firstName"] . " " . $item["lastName"],
				'<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
					
							<button type="button" data-id="' . $item['noteId'] . '" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary editNoteButton">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-edit"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
					
					</div>
					<div class="ms-2">
						<button type="button" data-id="' . $item['noteId'] . '" class="' . hideByPerm('admin') . ' btn btn-sm btn-icon btn-light btn-active-light-danger deleteNote" >
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

				$data = [
					'explanation' => post("explanation"),
					'createdBy' => Auth::get('userId'),
					'fkSale' => post('saleID') ?: null,
					'fkCustomer' => post('customerID') ?: null,
					'fkExpense' => post('expenseID') ?: null,
					'fkSupplier' => post('supplierID') ?: null,
				];

				if ($this->NoteModel->insert($data)) {
					return $this->response(1, "Notunuz başarıyla kaydedildi!");
				}
				return $this->response();

				break;
			case "EDIT":
				$id = post('noteID');
				$find = $this->NoteModel->first($id);
				if (!$find) return $this->response();
				if ($this->NoteModel->update(['explanation' => post('explanation')],$id)){
					return $this->response(1,"Değişiklikler başarıyla kaydedildi.");
				}
				return $this->response();
					break;
			case "FIND":
				$id = post('id');

				$find = $this->NoteModel->first($id);
				if ($find) {
					return $this->toJson([
						'status' => 1,
						'data' => $find
					]);
				}
				return $this->response();
				break;
			case "DELETE":
				$id = post("id");

				$delete = $this->NoteModel->delete($id);
				if ($delete) return $this->response(1, "Not başarıyla silindi!");
				return $this->response();
				break;
		}
	}
}
