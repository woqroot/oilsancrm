<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CityModel");
		$this->load->model("DistrictModel");
		$this->load->model("CustomerModel");
		$this->load->model("CustomerGroupModel");
	}

	public function list()
	{

		$data = [
			"cities" => $this->CityModel->all([], "title ASC"),
			"customerGroups" => $this->CustomerGroupModel->all([], "title ASC")
		];

		$this->setBreadcrumb(["Müşteriler", "Müşteri Listesi"]);
		$this->render($data);
	}

	public function action()
	{
		switch ($this->input->post("action")) {
			case "ADD":
				if(!post("name")) return $this->response(0,"Devam etmek için müşteri adı girmelisiniz...");
				$data = [
					"type" => post("customerType") ? post("customerType") : "INDIVIDUAL",
					"name" => post("name"),
					"shortName" => post("shortName") ?: null,
					"email" => post("email") ?: null,
					"fkCustomerGroup" => post("fkCustomerGroup") ?: null,
					"taxNumber" => post("customerType") == "INDIVIDUAL" ? post("identityNumber") : post("taxNumber"),
					"taxOffice" => post("taxOffice") ?: null,
					"notes" => post("notes") ?: null,
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" =>  post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" =>  post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address") ?: null,
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null
				];

				$insert = $this->CustomerModel->insert($data);

				if (!$insert) return $this->response();
				return $this->response(1, "Müşteri kaydı başarıyla oluşturuldu. ", ["redirectUrl" => base_url("customers/" . $insert["customerId"]),"name" => $insert["name"],"id" => $insert["customerId"]]);

				break;
			case "FIND":
				$customerID = $this->input->post("id");

				$data = $this->CustomerModel->first($customerID);

				if (!$data) $this->response();

				$data["districtName"] = isset($this->DistrictModel->first($data["fkDistrict"])["title"]) ? $this->DistrictModel->first($data["fkDistrict"])["title"] : "";

				return $this->toJson(["status" => 1, "data" => $data]);

				break;
			case "FIND_FOR_INVOICE":
				$customerID = $this->input->post("id");

				$data = $this->CustomerModel->first($customerID);

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

				$customerID = post("customerID");

				$data = [
					"type" => post("customerType") ? post("customerType") : "INDIVIDUAL",
					"name" => post("name"),
					"shortName" => post("shortName"),
					"email" => post("email"),
					"fkCustomerGroup" => post("fkCustomerGroup"),
					"taxNumber" => post("customerType") == "INDIVIDUAL" ? post("identityNumber") : post("taxNumber"),
					"taxOffice" => post("taxOffice"),
					"notes" => post("notes"),
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" =>  post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" =>  post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address"),
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null
				];

				$insert = $this->CustomerModel->update($data, $customerID);

				if (!$insert) return $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi!", ["redirectUrl" => base_url("customers/" . $customerID)]);

				break;
			case "EDIT_IN_INVOICE":

				$customerID = post("customerID");

				$data = [
					"type" => post("customerType") ? post("customerType") : "INDIVIDUAL",
					"name" => post("name"),
					"email" => post("email"),
					"fkCustomerGroup" => post("fkCustomerGroup"),
					"taxNumber" => post("customerType") == "INDIVIDUAL" ? post("identityNumber") : post("taxNumber"),
					"taxOffice" => post("taxOffice"),
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address")
				];

				$insert = $this->CustomerModel->update($data, $customerID);

				if (!$insert) return $this->response();

				$newData = $this->CustomerModel->first($customerID);

				$result = [
					"name" => $newData["name"],
					"address" => $newData["address"],
					"addressAgain" => getDistrict($newData["fkDistrict"]) . " / " . getCity($newData["fkCity"]) . " - " . getCountry($newData["fkCountry"]),
					"taxInformation" => $newData["taxNumber"] . " / " . $newData["taxOffice"]
				];

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!", ["redirectUrl" => base_url("customers/" . $customerID),"id" => $customerID,"name" => $data["name"],"data" => $result]);

				break;
		}
	}

	public function details($customerID)
	{
		$customer = $this->CustomerModel->first($customerID) ?: redirect(base_url());


		$data = [
			"data" => $customer,
			"cities" => $this->CityModel->all([], "title ASC"),
			"districts" => $this->DistrictModel->all(["fkCity" => $customer["fkCity"]]),
			"customerGroups" => $this->CustomerGroupModel->all([], "title ASC")

		];

		$this->setBreadcrumb(["Müşteri Detay", $customer["name"]]);
		$this->render($data);
	}

	public function ajax()
	{

		$searchableColumns = [
			"c.customerId",
			"c.name",
			"c.email",
			"c.phone",
			"c.shortName",
			"cg.title"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE c.deletedAt IS NULL";
		$filterCustomerGroupID = $this->input->post("customerGroupID");
		if ($filterCustomerGroupID > 0) {
			$whereSearch .= " AND c.fkCustomerGroup = '$filterCustomerGroupID'";
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
			$orderBy = "ORDER BY c.customerId DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->CustomerModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->CustomerModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->CustomerModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			if (!$item["phone"]) {
				$item["phone"] = "";
			}
			if (isCan("delete-customer")) {
				$deleteLink = '<div class="menu-item px-3">
											<a href="javascript:;" class="menu-link px-3 deleteButton">Sil</a>
										</div>';
			}

			if ($item["phone"]) {
				$drawPhone = private_str(phoneMask($item["phone"]), 7, 3) . " <a href='javascript:void(0)' data-text='" . ltrim($item["phone"], "9") . "' class='copyThis text-hover-primary badge badge-light-primary'><i class='fa fa-copy 2x '></i></a>";
			} else {
				$drawPhone = "-";
			}
			$customerViewLink = isCan("view-customer") ? base_url("customers/" . $item["customerId"]) : "javascript:void(0)";
			$customerName = $item["shortName"] ? $item["shortName"] . " - " . $item["name"] : $item["name"];
			$data[] = [
				$item["customerId"],
				'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="' . $customerViewLink . '"
									   class="text-gray-600 text-hover-primary mb-1">' . $customerName . '</a>
									<span class="text-gray-500">' . $item["email"] . '</span>
								</div></div>',
				$drawPhone,
				showBalance($item["balance"], true),
				'<span class="badge badge-success">' . $item["cgTitle"] . '</span>',
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
											<a href="' . $customerViewLink . '" class="menu-link px-3 deleteButton">Görüntüle</a>
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
		$results = $this->CustomerModel->search($str);


		foreach ($results as $result) {
			$nameField = "" . $result["customerId"] . " | ";
			$nameField .= $result["shortName"] ? $result["shortName"] . " (" . $result["name"] . ")" : $result["name"];
			$data["items"][] = [
				"id" => $result["customerId"],
				"name" => $nameField
			];
		}

		return $this->toJson($data);
	}
}
