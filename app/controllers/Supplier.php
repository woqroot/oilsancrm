<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CityModel");
		$this->load->model("DistrictModel");
		$this->load->model("SupplierModel");
	}

	public function list()
	{

		$data = [
			"cities" => $this->CityModel->all([], "title ASC")
		];

		$this->setBreadcrumb(["Müşteriler", "Müşteri Listesi"]);
		$this->render($data);
	}

	public function action()
	{
		switch ($this->input->post("action")) {
			case "ADD":
				if (!post("name")) return $this->response(0, "Devam etmek için tedarikçi adı girmelisiniz...");
				$data = [
					"name" => post("name"),
					"email" => post("email") ?: null,
					"taxNumber" => post("taxNumber") ?: null,
					"taxOffice" => post("taxOffice") ?: null,
					"notes" => post("notes") ?: null,
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address") ?: null,
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null
				];

				$insert = $this->SupplierModel->insert($data);

				if (!$insert) return $this->response();
				return $this->response(1, "Kayıt başarıyla oluşturuldu. Yönlendiriliyorsunuz...", ["redirectUrl" => base_url("suppliers/" . $insert["supplierId"]), "name" => $insert["name"], "id" => $insert["supplierId"]]);

				break;

			case "FIND":
				$supplierID = $this->input->post("id");

				$data = $this->SupplierModel->first($supplierID);

				if (!$data) $this->response();

				$data["districtName"] = isset($this->DistrictModel->first($data["fkDistrict"])["title"]) ? $this->DistrictModel->first($data["fkDistrict"])["title"] : "";
				$data["phoneMasked"] = phoneMask($data["phone"]);
				return $this->toJson(["status" => 1, "data" => $data]);

				break;
			case "FIND_FOR_INVOICE":
				$supplierID = $this->input->post("id");

				$data = $this->SupplierModel->first($supplierID);

				if (!$data) $this->response();

				$city = $this->CityModel->first($data["fkCity"]) ?: ["title" => ""];
				$district = $this->DistrictModel->first($data["fkDistrict"]) ?: ["title" => ""];
				$country = $this->CountryModel->first($data["fkCountry"]) ?: ["title" => ""];
				$data["taxInformation"] = $data["taxNumber"] && $data["taxOffice"] ? $data["taxNumber"] . " / " . $data["taxOffice"] : "-";
				$result = [
					"name" => $data["name"],
					"address" => $data["address"],
					"addressAgain" => $district["title"] . " / " . $city["title"] . " - " . $country["title"],
					"taxInformation" => $data["taxInformation"]
				];

				return $this->toJson(["status" => 1, "data" => $result]);

				break;

			case "EDIT":

				$supplierID = post("supplierID");

				$data = [
					"type" => post("supplierType") ? post("supplierType") : "INDIVIDUAL",
					"name" => post("name"),
					"shortName" => post("shortName"),
					"email" => post("email"),
					"taxNumber" => post("supplierType") == "INDIVIDUAL" ? post("identityNumber") : post("taxNumber"),
					"taxOffice" => post("taxOffice"),
					"notes" => post("notes"),
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address"),
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null
				];

				$insert = $this->SupplierModel->update($data, $supplierID);

				if (!$insert) return $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi!", ["redirectUrl" => base_url("suppliers/" . $supplierID)]);

				break;
			case "EDIT_IN_INVOICE":

				$supplierID = post("supplierID");

				$data = [
					"name" => post("name"),
					"email" => post("email"),
					"phone" => phoneMask(post("phone")),
					"taxNumber" => post("taxNumber"),
					"taxOffice" => post("taxOffice"),
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address")
				];

				$insert = $this->SupplierModel->update($data, $supplierID);

				if (!$insert) return $this->response();

				$newData = $this->SupplierModel->first($supplierID);

				$result = [
					"name" => $newData["name"],
					"address" => $newData["address"],
					"addressAgain" => getDistrict($newData["fkDistrict"]) . " / " . getCity($newData["fkCity"]) . " - " . getCountry($newData["fkCountry"]),
					"taxInformation" => $newData["taxNumber"] . " / " . $newData["taxOffice"]
				];

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!", ["redirectUrl" => base_url("suppliers/" . $supplierID), "id" => $supplierID, "name" => $data["name"], "data" => $result]);

				break;
		}
	}

	public function details($supplierID)
	{
		$supplier = $this->SupplierModel->first($supplierID) ?: redirect(base_url());


		$data = [
			"data" => $supplier,
			"cities" => $this->CityModel->all([], "title ASC"),
			"districts" => $this->DistrictModel->all(["fkCity" => $supplier["fkCity"]]),

		];

		$this->setBreadcrumb(["Müşteri Detay", $supplier["name"]]);
		$this->render($data);
	}

	public function ajax()
	{

		$searchableColumns = [
			"s.supplierId",
			"s.name",
			"s.phone",
			"s.email",
			"s.balance"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE s.deletedAt IS NULL";

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
			$orderBy = "ORDER BY s.supplierId DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->SupplierModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->SupplierModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->SupplierModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			if (!$item["phone"]) {
				$item["phone"] = "";
			}
			if (isCan("delete-supplier")) {
				$deleteLink = '<div class="menu-item px-3">
											<a href="javascript:;" class="menu-link px-3 deleteButton">Sil</a>
										</div>';
			}

			if ($item["phone"]) {
				$drawPhone = private_str(phoneMask($item["phone"]), 7, 3) . " <a href='javascript:void(0)' data-text='" . ltrim($item["phone"], "9") . "' class='copyThis text-hover-primary badge badge-light-primary'><i class='fa fa-copy 2x '></i></a>";
			} else {
				$drawPhone = "-";
			}
			$supplierViewLink = isCan("view-supplier") ? base_url("suppliers/" . $item["supplierId"]) : "javascript:void(0)";
			$supplierName = $item["shortName"] ? $item["shortName"] . " - " . $item["name"] : $item["name"];
			$data[] = [
				$item["supplierId"],
				'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="' . $supplierViewLink . '"
									   class="text-gray-600 text-hover-primary mb-1">' . $supplierName . '</a>
									<span class="text-gray-500">' . $item["email"] . '</span>
								</div></div>',
				$drawPhone,
				$item["email"],
				showBalance($item["balance"], true),
				'
				<a href="javascript:void(0)" class="btn btn-light btn-active-light-primary btn-sm"
									   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">İşlemler
										<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
																 height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																	  fill="black"></path>
															</svg>
														</span></a>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
										 data-kt-menu="true" style="">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="' . $supplierViewLink . '" class="menu-link px-3 deleteButton">Görüntüle</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										' . $deleteLink . '
										
										<!--end::Menu item-->
									</div>
									'
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

	public function search()
	{

		$str = isset($this->input->post("term")["term"]) ? $this->input->post("term")["term"] : null;
		$data = [
			"items" => []
		];
		$results = $this->SupplierModel->search($str);


		foreach ($results as $result) {
			$nameField = "" . $result["supplierId"] . " | ";
			$nameField .= $result["shortName"] ? $result["shortName"] . " (" . $result["name"] . ")" : $result["name"];
			$data["items"][] = [
				"id" => $result["supplierId"],
				"name" => $nameField
			];
		}

		return $this->toJson($data);
	}
}
