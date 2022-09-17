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
		$this->load->model("TrialProductModel");
		$this->load->model("ProductModel");
		$this->load->model("DocumentModel");
		$this->load->model("CustomerSourceModel");
		$this->load->model("SectorModel");
	}

	public function list()
	{

		$data = [
			"cities" => $this->CityModel->all([], "title ASC"),
			"customerGroups" => $this->CustomerGroupModel->all([], "title ASC"),
			'customerSources' => $this->CustomerSourceModel->all([], 'title ASC'),
			'sectors' => $this->SectorModel->all([], 'title ASC')
		];

		$this->setBreadcrumb(["Müşteriler", "Müşteri Listesi"]);
		$this->render($data);
	}

	public function action()
	{
		switch ($this->input->post("action")) {
			case "ADD":
				if (!post("name")) return $this->response(0, "Devam etmek için müşteri adı girmelisiniz...");
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
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address") ?: null,
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null,
					'fkCustomerSource' => post('fkSource'),
					'fkSector' => post('fkSector'),
					'fkUser' => Auth::get('userId')
				];

				$insert = $this->CustomerModel->insert($data);

				if (!$insert) return $this->response();
				return $this->response(1, "Müşteri kaydı başarıyla oluşturuldu. ", ["redirectUrl" => base_url("customers/" . $insert["customerId"]), "name" => $insert["name"], "id" => $insert["customerId"]]);

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
					"type" => post("type") ? post("type") : "INDIVIDUAL",
					"name" => post("name"),
					"shortName" => post("shortName"),
					"email" => post("email"),
					"fkCustomerGroup" => post("fkCustomerGroup"),
					"taxNumber" => post("customerType") == "INDIVIDUAL" ? post("identityNumber") : post("taxNumber"),
					"taxOffice" => post("taxOffice"),
					"notes" => post("notes"),
					"fkCountry" => post("fkCountry") ? post("fkCountry") : 1,
					"fkCity" => post("fkCountry") == 1 ? post("fkCity") : null,
					"fkDistrict" => post("fkCountry") == 1 ? post("fkDistrict") : null,
					"address" => post("address"),
					"phone" => post("phone") ? phoneMask(post("phone")) : null,
					"secondPhone" => post("secondPhone") ? phoneMask(post("secondPhone")) : null,
					'fkCustomerSource' => post('fkSource'),
					'fkSector' => post('fkSector'),


				];

				if(isCan('admin') && post('fkUser')){
					$data['fkUser'] = post('fkUser');
				}
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

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!", ["redirectUrl" => base_url("customers/" . $customerID), "id" => $customerID, "name" => $data["name"], "data" => $result]);

				break;
			case "ADD_CONTACT":

				$this->load->model('CustomerContactModel');

				$customerID = post('customerID');

				$customer = $this->CustomerModel->first($customerID);
				if (!$customer)
					return $this->response();

				$data = [
					'name' => post('name'),
					'phone' => post('phone') ? phoneMask(post('phone')) : null,
					'email' => post('email'),
					'department' => post('department'),
					'fkCustomer' => $customerID
				];

				$success = $this->CustomerContactModel->insert($data);

				if ($success)
					return $this->response(1, "Değişiklikler başarıyla kaydedildi.");

				return $this->response();

				break;

			case "GET_CONTACT":

				$this->load->model("CustomerContactModel");
				$id = post('id');

				$data = $this->CustomerContactModel->first($id);
				$data["phone"] = phoneMask($data['phone']);
				return $this->toJson(['success' => 1, 'data' => $data]);
				break;

			case "EDIT_CONTACT":
				$this->load->model("CustomerContactModel");
				$id = post('contactID');

				$customerContact = $this->CustomerContactModel->first($id);

				if (!$customerContact)
					return $this->response(0, "Kayıt bulunamadı.");

				$data = [
					'name' => post('name'),
					'phone' => post('phone') ? phoneMask(post('phone')) : null,
					'email' => post('email'),
					'department' => post('department')
				];

				$success = $this->CustomerContactModel->update($data, $customerContact['customerContactId']);

				if ($success)
					return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				return $this->response();

				break;

			case "DELETE_CONTACT":

				$this->load->model("CustomerContactModel");
				$id = post('id');

				$data = $this->CustomerContactModel->first($id);
				if (!$data)
					return $this->response(0, "Kayıt bulunamadı.");

				if ($this->CustomerContactModel->delete($id))
					return $this->response(1, "Kayıt başarıyla silindi.");

				return $this->response();
				break;
		}
	}

	public function details($customerID)
	{
		$customer = $this->CustomerModel->first($customerID) ?: redirect(base_url());

		$trialproducts = [];

		foreach ($this->TrialProductModel->all(['fkCustomer' => $customerID]) as $item) {

			$item["productName"] = $this->ProductModel->first($item['fkProduct'])["name"] ?? null;

			$trialproducts[] = $item;
		}


		$documents = [];

		foreach ($this->DocumentModel->all(['fkCustomer' => $customerID], 'updatedAt ASC') as $item) {
			$item["sale"] = $this->SaleModel->first($item['fkSale']);
			$item["user"] = $this->UserModel->first($item['createdBy']);
			if ($item["sale"] && $item["user"]) {
				$documents[] = $item;
			}
		}
		$this->load->model("CustomerContactModel");
		$data = [
			"data" => $customer,
			"cities" => $this->CityModel->all([], "title ASC"),
			"districts" => $this->DistrictModel->all(["fkCity" => $customer["fkCity"]]),
			"customerGroups" => $this->CustomerGroupModel->all([], "title ASC"),
			"sales" => $this->SaleModel->all(['fkCustomer' => $customerID], 'fkStatus ASC, invoiceDate ASC'),
			"documents" => $documents,
			"trialProducts" => $trialproducts,
			"statistics" => $this->CustomerModel->getStatistics($customerID),
			"sortedProducts" => $this->ProductModel->all([], "name ASC"),
			"units" => $this->UnitModel->all([], "name ASC"),
			"contacts" => $this->CustomerContactModel->all(['fkCustomer' => $customerID]),
			'customerSources' => $this->CustomerSourceModel->all([], 'title ASC'),
			'source' => $this->CustomerSourceModel->first($customer['fkCustomerSource']),
			'user' => $this->UserModel->first(['userId' => $customer['fkUser']]),
			'staffs' => $this->UserModel->all([],'firstName ASC'),
			'sectors' => $this->SectorModel->all([], 'title ASC')
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

		$filterByIsActive = $this->input->post("filterByIsActive");
		if($filterByIsActive === "0" || $filterByIsActive === "1"){
			$whereSearch .= " AND c.isActive = '$filterByIsActive'";

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
			if (isCan("admin")) {
				$deleteLink = '';
			}

			if ($item["isActive"] == 1) {
				$isActiveHTML = '<span class="badge badge-success">Aktif</span>';
			} else {
				$isActiveHTML = '<span class="badge badge-danger">Pasif</span>';
			}

			if ($item["phone"]) {
				$drawPhone = private_str(phoneMask($item["phone"]), 7, 3) . " <a href='javascript:void(0)' data-text='" . ltrim($item["phone"], "9") . "' class='copyThis text-hover-primary badge badge-light-primary'><i class='fa fa-copy 2x '></i></a>";
			} else {
				$drawPhone = "-";
			}
			$customerViewLink = base_url("customers/" . $item["customerId"]);
			$customerName = $item["shortName"] ? $item["shortName"] . " - " . $item["name"] : $item["name"];
			$data[] = [
				$item["customerId"],
				$isActiveHTML,
				'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="' . $customerViewLink . '"
									   class="text-gray-600 text-hover-primary mb-1">' . $customerName . '</a>
									<span class="text-gray-500">' . $item["email"] . '</span>
								</div></div>',
				$drawPhone,
				'<span class="badge badge-success">' . $item["cgTitle"] . '</span>',
				'
				<a href="' . $customerViewLink . '" class="btn btn-light-primary btn-sm">Görüntüle</a>
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
