<?php

class TrialProduct extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("TrialProductModel");
		$this->load->model("SaleModel");
		$this->load->model("CustomerModel");
		$this->load->model("ProductModel");
		$this->load->model("UnitModel");
	}

	public function index()
	{
		$this->setBreadcrumb('Deneme Ürünleri');
		$data["units"] = $this->UnitModel->all([], "name ASC");
		$data["sortedProducts"] = $this->ProductModel->all([], "name ASC");
		$this->render($data);
	}

	public function ajax()
	{

		$searchableColumns = [
			"tp.trialProductId",
			"p.name",
			"tp.startDate"
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
			$orderBy = "ORDER BY tp.tpStatus ASC, tp.createdAt DESC";
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

			if ($item['tpStatus'] == 0) {
				$stat = "<span class='badge badge-sm badge-warning text-gray-700'>Devam Ediyor</span>";
			} elseif ($item['tpStatus'] == 1) {
				$stat = "<span class='badge badge-sm badge-success'>Başarılı Sonuç</span>";
			} elseif ($item['tpStatus'] == 2) {
				$stat = "<span class='badge badge-sm badge-danger'>Başarısız Sonuç</span>";
			}
			$data[] = [
				"<span data-status='" . $item["tpStatus"] . "' data-id='" . $item["trialProductId"] . "' class='tpStatus badge badge-sm badge-light-primary'>#" . $item["trialProductId"] . "</span>",
				"<span class='badge badge-light-primary'>" . $item["amount"] . " " . $item["unitName"] . "</span>" . " " . $item["name"],
				localizeDate("d M Y l", $item["startDate"]),
				$stat,
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

	public function ajaxGeneral()
	{

		$searchableColumns = [
			"tp.trialProductId",
			"s.invoiceNumber",
			"c.name",
			"p.name",
			"tp.startDate",
			"tp.endDate",
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE tp.deletedAt IS NULL";


//		$filterCustomerGroupID = $this->input->post("customerGroupID");
//		if ($filterCustomerGroupID > 0) {
//			$whereSearch .= " AND c.fkCustomerGroup = '$filterCustomerGroupID'";
//		}

		$startDateBetween = post("startDateBetween");
		if ($startDateBetween) {
			$string = explode(' - ', $startDateBetween);

			$date1 = explode('/', $string[0]);
			$date2 = explode('/', $string[1]);

			$finalDate1 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
			$finalDate2 = $date2[2] . '-' . $date2[1] . '-' . $date2[0];

			$whereSearch .= " AND tp.startDate >= '$finalDate1' AND tp.startDate <= '$finalDate2'";


		}

		$endDateBetween = post("endDateBetween");
		if ($endDateBetween) {
			$string = explode(' - ', $endDateBetween);

			$date1 = explode('/', $string[0]);
			$date2 = explode('/', $string[1]);

			$finalDate1 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
			$finalDate2 = $date2[2] . '-' . $date2[1] . '-' . $date2[0];

			$whereSearch .= " AND tp.endDate >= '$finalDate1' AND tp.endDate <= '$finalDate2'";


		}


		if ($_POST['statusID'] === "0" || $_POST['statusID'] === "1" || $_POST['statusID'] === "2") {
			$stID = $_POST['statusID'];
			$whereSearch .= " AND tp.tpStatus = '$stID'";
		}
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
			$orderBy = "ORDER BY tp.tpStatus ASC, tp.endDate ASC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		if (!isCan('admin')) {
			$whereSearch .= " AND s.fkUser = '" . Auth::get('userId') . "'";
		}

		$list = $this->TrialProductModel->list($whereSearch, $orderBy, $limit);

		$data = [];

		$countTotalRecords = $this->TrialProductModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->TrialProductModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = '';
			if (isCan('admin')) {
				$deleteLink = '<div class="ms-2">
						<button type="button" data-id="' . $item['trialProductId'] . '" data-saleid="' . $item["fkSale"] . '" class="btn btn-sm btn-icon btn-light btn-active-light-danger deleteTrialProduct" >
							<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
							<span class="svg-icon svg-icon-5 m-0">
								<i class="fa fa-trash"></i>
							</span>
							<!--end::Svg Icon-->
						</button>
					</div>';
			}


			$userText = '<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<span 
									   class="text-gray-600 mb-1">' . $item["userFirstName"] . ' ' . $item["userLastName"] . '</span>
									<span class="text-gray-500">' . $item["userEmail"] . '</span>
								</div></div>';

			if (strtotime($item['endDate']) <= time()) {
				$endDate = '<span class="text-danger fw-bolder">' . localizeDate("d M Y", $item["endDate"]) . '</span>';
			} else {
				$endDate = '<span class="">' . localizeDate("d M Y", $item["endDate"]) . '</span>';

			}
			$_data = [
				"<span data-status='" . $item["tpStatus"] . "' data-id='" . $item["trialProductId"] . "' class='tpStatus badge badge-sm badge-light-primary'>#" . $item["trialProductId"] . "</span>",
				'<a target="_blank" href="' . base_url('sales/' . $item['fkSale']) . '"><span class="badge badge-primary">#' . $item['invoiceNumber'] . '</span></a> - <a target="_blank" href="' . base_url('customers/' . $item['fkCustomer']) . '">' . $item['customerName'] . '</a>',

				"<span class='badge badge-light-primary'>" . $item["amount"] . " " . $item["unitName"] . "</span>" . " " . $item["name"],
				localizeDate("d M Y", $item["startDate"]),
				$endDate,
				$userText
			];
			if (!isCan('admin')) {
				unset($_data[5]);
				$_data[5] = '<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
					
							<button type="button" data-id="' . $item['trialProductId'] . '" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary editTrialProductButton">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-eye"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
					
					</div>
					' . $deleteLink . '
				</div>';
			} else {
				$_data[6] = '<div class="d-flex">
					<div class="ms-2" data-kt-filemanger-table="copy_link">
					
							<button type="button" data-id="' . $item['trialProductId'] . '" class=" text-hover-primary btn btn-sm btn-icon btn-light btn-hover-light-primary editTrialProductButton">
								<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
								<span class="svg-icon svg-icon-5 m-0">
									<i class=" fa fa-eye"></i>
								</span>
								<!--end::Svg Icon-->
							</button>
					
					</div>
					' . $deleteLink . '
				</div>';
			}

			$data[] = $_data;


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
				if (count($_POST['products']) <= 0 || !$_POST['products']['0']['productID']) {
					return $this->response(0, "En az bir ürün seçimi yapmalısınız.");
				}

				if (!post('startDate') || !post('endDate'))
					return $this->response(0, "Ürünlerin verildiği tarih ve tahmini geri alım tarihini girmelisiniz.");

				$data = [
					'department' => post('department'),
					'equipment' => post('equipment'),
					'author' => post('author'),
					'expectedPerformance' => post('expectedPerformance'),
					'resultPerformance' => post('resultPerformance'),
					'startDate' => reLocalizeDate(post('startDate')),
					'endDate' => reLocalizeDate(post('endDate')),
					'fkSale' => post('saleID'),
					'fkCustomer' => post('customerID'),
					'createdBy' => Auth::get('userId'),
					'tpStatus' => 0
				];

				foreach ($_POST['products'] as $product) {

					$data['fkProduct'] = $product['productID'];
					$data['amount'] = $product['amount'];
					$data['fkUnit'] = $product['unitID'];

					$this->TrialProductModel->insert($data);

				}
				$this->SaleModel->update(['fkStatus' => 3, 'approvedAt' => null], post('saleID'));
				return $this->response(1, "Deneme süreci başarıyla oluşturuldu!");

				break;
			case "DELETE":
				$id = post("id");

				$delete = $this->TrialProductModel->delete($id);
				if ($delete) return $this->response(1, "Deneme süreci başarıyla silindi!");
				return $this->response();
				break;
			case "EDIT":

				$trialProductID = post('trialProductID');
				$tp = $this->TrialProductModel->first($trialProductID);
				if (!$tp) {
					return $this->response();
				}
				$data = [
					'department' => post('department'),
					'equipment' => post('equipment'),
					'author' => post('author'),
					'expectedPerformance' => post('expectedPerformance'),
					'resultPerformance' => post('resultPerformance'),
					'startDate' => reLocalizeDate(post('startDate')),
					'notes' => post('notes'),
					'endDate' => reLocalizeDate(post('endDate')),
					'tpStatus' => post('tpStatus'),
					'amount' => post('amount'),
					'fkUnit' => post('unitID')
				];

				if ($data['tpStatus'] == 0) {
					$this->SaleModel->update(['fkStatus' => 3, 'approvedAt' => null], $tp['fkSale']);
				}

				$success = $this->TrialProductModel->update($data, $trialProductID);

				if ($success)
					return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				return $this->response();
				break;
			case "FIND":
				$id = post('id');

				$find = $this->TrialProductModel->first($id);
				if ($find) {
					return $this->toJson([
						'status' => 1,
						'data' => $find
					]);
				}
				return $this->response();
				break;
		}
	}


}
