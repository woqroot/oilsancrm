<?php

class Sale extends NP_Controller
{
	/**
	 * @throws Exception
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("SaleModel");
		$this->load->model("CurrencyModel");
		$this->load->model("CustomerGroupModel");
		$this->load->model("UnitModel");
		$this->load->model("CollectModel");
		$this->load->model("CustomerModel");
		$this->load->model("SaleProductModel");
		$this->load->model("DocumentModel");
		$this->load->model("UserModel");
		$this->load->model("AccountModel");
		$this->load->model("ProductModel");
		$this->load->model("StackActivityModel");
		$this->load->model("BrandModel");
		$this->load->model("ProductTypeModel");
		$this->load->model("ProductPackModel");
		$this->load->model("ProductFluidityModel");
		$this->load->library('NPMailer');

	}

	public function list()
	{
		$data = [
			'statuses' => $this->StatusModel->all([], 'title ASC'),
			'users' => $this->UserModel->all(['fkRole' => 2], 'firstName ASC,lastName ASC')
		];
		$this->setBreadcrumb("Satışlar");

		$this->render($data);
	}

	public function add()
	{


		$this->setBreadcrumb(["Satışlar", "Yeni Oluştur"]);
		$data = [
			"currencies" => $this->CurrencyModel->all([], "currencyId"),
			"cities" => $this->CityModel->all([], "title ASC"),
			"customerGroups" => $this->CustomerGroupModel->all([], "title ASC"),
			"units" => $this->UnitModel->all([], "name ASC"),
			"company" => json_decode(config('companyInformation'), true),
			"users" => $this->UserModel->all(),
			"statuses" => $this->StatusModel->all([], 'statusId ASC')
		];


		$lastSale = $this->SaleModel->last();

		$data["defaultInvoiceNumber"] = $lastSale ? generateInvoiceNumber($lastSale["saleId"]) : generateInvoiceNumber();
		$this->render($data);
	}

	public function edit($id)
	{


		$sale = $this->SaleModel->first($id);
		if (!$sale) redirect("sales");
		$data = [
			"units" => $this->UnitModel->all([], "name ASC"),
			"cities" => $this->CityModel->all(),
			"customerGroups" => $this->CustomerGroupModel->all(),
			"company" => json_decode(config('companyInformation'), true),
			"statuses" => $this->StatusModel->all([], 'statusId ASC')
		];


		$data["sale"] = $sale;
		$data["products"] = $this->SaleProductModel->all(["fkSale" => $sale["saleId"]], "saleProductId ASC");
		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			if ($findProduct) {
				$findProduct["brand"] = $this->BrandModel->first($findProduct['fkBrand']);
				$findProduct["productType"] = $this->ProductTypeModel->first($findProduct['fkProductType']);
				$findProduct["productPack"] = $this->ProductPackModel->first($findProduct['fkProductPack']);
				$findProduct["productFluidity"] = $this->ProductFluidityModel->first($findProduct['fkProductFluidity']);
				$data["products"][$index]["item"] = $findProduct;
			}

		}
		$data["customer"] = $this->CustomerModel->first($sale["fkCustomer"]);
		$data["currencies"] = $this->CurrencyModel->all();
		$data["sortedProducts"] = $this->ProductModel->all([], "name ASC");
		$data["user"] = $this->UserModel->first($sale["fkUser"]);
		$data["users"] = $this->UserModel->all(['fkRole' => 2]);

		$this->setBreadcrumb("Satış Detay");

		$editable = true;

		if (!isCan('admin') && ($sale["fkStatus"] == 4 || $sale["fkStatus"] == 5)) {
			$editable = false;
		}


		$data["editable"] = $editable;

		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				if (isCan("admin")) {
					$fkUser = post("fkUser");
				} else {
					$fkUser = Auth::get('userId');
				}
				$findCustomer = $this->CustomerModel->first(post("customerID"));
				$findCurrency = $this->CurrencyModel->first(post("fkCurrency"));
				$findAccount = $this->AccountModel->first(post("fkAccount"));

				if (!$findCustomer) return $this->response(0, "Devam etmek için bir müşteri seçin.");
				if (!$findCurrency) return $this->response(0, "Geçerli bir döviz seçimi yapmalısınız.");
				if (post("isCollected") == 1 && (!$findAccount || $findAccount["fkCurrency"] != $findCurrency["currencyId"])) return $this->response(0, "Geçerli bir hesap seçimi yapmalısınız.");

				$saleData = [
					"invoiceDate" => reLocalizeDate(post("invoiceDate")),
					"invoiceNumber" => post("invoiceNumber"),
					"fkCustomer" => post("customerID"),
					"notes" => post("notes"),
					"invoiceNotes" => post("invoiceNotes"),
					"fkCurrency" => post("fkCurrency"),
					"fkUser" => $fkUser,
					"fkStatus" => post("fkStatus") ?: 1
				];
				if (post("fkStatus") == 4)
					$saleData['approvedAt'] = date('Y-m-d');


				$saleData["totalPrice"] = 0;
				$saleData["totalVat"] = 0;
				$saleData["totalPriceWithVat"] = 0;
				$productData = [];
				$_countProduct = 0;
				$this->db->trans_begin();
				foreach ($_POST["product"]["name"] as $index => $item) {
					if (trim($item)) {
						$_countProduct++;
						$prodName = explode(" [-", post("product")["name"][$index])[0];
						$findProduct = $this->ProductModel->first(["name" => $prodName]);
						if (!$findProduct) {
							$last = $this->ProductModel->last();
							if (!$last) $last["productId"] = 0;

							$defualtCode = "OIL" . date("Y") . "0" . $last["productId"] + 1;
							$newProduct = [
								"type" => "PRODUCT",
								"stockTracking" => "PASSIVE",
								"initialStock" => 0,
								"stock" => 0,
								"name" => post("product")["name"][$index],
								"productCode" => $defualtCode,
								"unitPrice" => rounder(commaToDot(post("product")["price"][$index])),
								"fkUnit" => post("product")["unit"][$index],
								"fkCurrency" => $saleData["fkCurrency"],
								"vatPercent" => post("product")["vat"][$index],
								"totalPrice" => includeVat(rounder(commaToDot(post("product")["price"][$index]), intval(post("product")["vat"][$index])))
							];


							$this->ProductModel->insert($newProduct);

							$prodName = explode(" [-", post("product")["name"][$index])[0];
							$findProduct = $this->ProductModel->first(["name" => $prodName]);
						}

						if ($findProduct) {

							$unitPrice = commaToDot(post("product")["price"][$index]);
							$quantity = post("product")["quantity"][$index];
							$totalPrice = $unitPrice * $quantity;

							$_productData = [
								"name" => post("product")["name"][$index],
								"quantity" => post("product")["quantity"][$index],
								"fkUnit" => post("product")["unit"][$index],
								"unitPrice" => $unitPrice,
								"totalPrice" => $totalPrice,
								"vatPercent" => post("product")["vat"][$index],
								"totalPriceWithVat" => includeVat($totalPrice, post("product")["vat"][$index]),
								"fkProduct" => $findProduct["productId"]
							];

							$saleData["totalPrice"] += rounder($_productData["totalPrice"]);
							$saleData["totalVat"] += rounder($_productData["totalPrice"]) * $_productData["vatPercent"] / 100;
							$saleData["totalPriceWithVat"] += rounder($_productData["totalPriceWithVat"]);

//							$this->SaleProductModel->insert($productData);

							$productData[] = $_productData;

							if ($findProduct["stockTracking"] == "ACTIVE") {
								$this->StackActivityModel->decrease($quantity, "<b>" . $findCustomer['name'] . "</b> isimli müşteriye satış - #" . $saleData["invoiceNumber"], $findProduct["productId"]);
							}
						}

					}
				}

//				if ($_countProduct <= 0) {
//					return $this->response(0, "En az 1 ürün/hizmet seçimi yapmalısınız.");
//				}

				// $saleData = array_merge($saleData, $collectData);

				$updateCustomerBalance = $this->CustomerModel->increaseBalance($saleData["totalPriceWithVat"], $findCustomer["customerId"]);

				$saleData["totalPrice"] = rounder(number_format($saleData["totalPrice"], 4, ".", ""));
				$saleData["totalVat"] = rounder(number_format($saleData["totalVat"], 2, ".", ""));
				$saleData["totalPriceWithVat"] = rounder(number_format($saleData["totalPriceWithVat"], 2, ".", ""));
				if (post("isCollected") == 1 && $updateCustomerBalance) {

					$collectData = [
						"amount" => $saleData["totalPriceWithVat"],
						"collectDate" => reLocalizeDate(post("collectDate")),
						"fkCurrency" => post("fkCurrency"),
						"fkAccount" => post("fkAccount"),
						"fkCustomer" => $saleData["fkCustomer"]
					];

				}

				$saleData["balance"] = $saleData["totalPriceWithVat"];

				$insertSale = $this->SaleModel->insert($saleData);
				if ($insertSale) {
					Logger::insert("ADD_SALE", ["fkSale" => $insertSale["saleId"]]);

					foreach ($productData as $productDatum) {
						$productDatum["fkSale"] = $insertSale["saleId"];
						$this->SaleProductModel->insert($productDatum);
					}
					if (isset($collectData)) {
						$collectData["fkSale"] = $insertSale["saleId"];

						$insertCollect = $this->CollectModel->insert($collectData);
						if ($insertCollect) {
							Logger::insert("ADD_COLLECT", ["fkSale" => $insertSale["saleId"], "fkCollect" => $insertCollect["collectId"]]);

							AccountManager::set($collectData["fkAccount"])
								->targetId($insertCollect["collectId"])
								->saleCollect($collectData["collectDate"], $collectData["amount"], $insertSale["saleId"], $insertSale["fkCustomer"]);
						}
					}
					$ss = "x";
					if (isset($_FILES["invoiceDocument"]["tmp_name"]) && $_FILES["invoiceDocument"]["tmp_name"]) {
						$fileName = upload_file("invoiceDocument", "sale-documents");
						$data = [
							"name" => "Ek Dosya - 1",
							"document" => $fileName,
							"fkSale" => $insertSale["saleId"],
							"createdBy" => Auth::get("userId")
						];

						$this->DocumentModel->insert($data);
					}

					$this->CustomerModel->update(['isActive' => 1], $saleData['fkCustomer']);

				}
				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
				} else {
					$this->db->trans_commit();
				}
				return $this->response(1, "Satış kaydı başarıyla oluşturuldu.", ["data" => $insertSale]);


				break;
			case "EDIT":

				$saleID = post("saleID");


				$findSale = $this->SaleModel->first($saleID);
				if (!$findSale) $this->response(0, "Satış bulunamadı...");

				$saleData = [
					"invoiceDate" => reLocalizeDate(post("invoiceDate")),
//					"invoiceNumber" => post("invoiceNumber"),
					"notes" => post("notes"),
					"invoiceNotes" => post("invoiceNotes")
				];


				$saleData["totalPrice"] = 0;
				$saleData["totalVat"] = 0;
				$saleData["totalPriceWithVat"] = 0;

				$_countProduct = 0;

				$nonDeletedProducts = [];
				$this->db->trans_begin();
				if (isset($_POST["product"]["old"]["saleProductId"])) {
					foreach ($_POST["product"]["old"]["saleProductId"] as $index => $item) {
						$nonDeletedProducts[] = $item;
						if (trim($item)) {
							$_countProduct++;
							$prodName = explode(" [-", post("product")["old"]["saleProductId"][$index])[0];
							$findProduct = $this->ProductModel->first(["name" => $prodName]);

							$unitPrice = commaToDot(post("product")["old"]["price"][$index]);
							$quantity = post("product")["old"]["quantity"][$index];
							$totalPrice = $unitPrice * $quantity;
							$totalPriceWithVat = includeVat($totalPrice, post("product")["old"]["vat"][$index]);
							$updateSaleProductData = [
								"quantity" => post("product")["old"]["quantity"][$index],
								"fkUnit" => post("product")["old"]["unit"][$index],
								"unitPrice" => $unitPrice,
								"totalPrice" => $totalPrice,
								"vatPercent" => post("product")["old"]["vat"][$index],
								"totalPriceWithVat" => $totalPriceWithVat
							];

							$this->SaleProductModel->update($updateSaleProductData, post("product")["old"]["saleProductId"][$index]);

							$saleData["totalPrice"] += $updateSaleProductData["totalPrice"];
							$saleData["totalVat"] += $updateSaleProductData["totalPrice"] * $updateSaleProductData["vatPercent"] / 100;
							$saleData["totalPriceWithVat"] += $updateSaleProductData["totalPriceWithVat"];
							$_countProduct++;

//							if ($findProduct["stockTracking"] == "ACTIVE") {
//								$this->StackActivityModel->decrease($quantity, "<b>" . $findCustomer['name'] . "</b> isimli müşteriye satış - #" . $saleData["invoiceNumber"], $findProduct["productId"]);
//							}
						}
					}
				}

				foreach ($this->SaleProductModel->all(["fkSale" => $saleID]) as $item) {
					if (!in_array($item["saleProductId"], $nonDeletedProducts)) {
						$this->SaleProductModel->delete($item["saleProductId"]);
					}
				}

				foreach ($_POST["product"]["new"]["name"] as $index => $item) {
					if (trim($item)) {
						$_countProduct++;
						$findProduct = $this->ProductModel->first(["name" => post("product")["new"]["name"][$index]]);
						if (!$findProduct) {
							$last = $this->ProductModel->last();
							if (!$last) $last["productId"] = 1;

							$defualtCode = "NP" . date("Y") . "0" . $last["productId"] + 1;
							$newProduct = [
								"type" => "PRODUCT",
								"stockTracking" => "PASSIVE",
								"initialStock" => 0,
								"stock" => 0,
								"name" => post("product")["new"]["name"][$index],
								"productCode" => $defualtCode,
								"unitPrice" => commaToDot(post("product")["new"]["price"][$index]),
								"fkUnit" => post("product")["new"]["unit"][$index],
								"fkCurrency" => $findSale["fkCurrency"],
								"vatPercent" => post("product")["new"]["vat"][$index],
								"totalPrice" => includeVat(commaToDot(post("product")["new"]["price"][$index]), intval(post("product")["new"]["vat"][$index]))
							];

							$this->ProductModel->insert($newProduct);

							$findProduct = $this->ProductModel->first(["name" => post("product")["new"]["name"][$index]]);
						}
						if ($findProduct) {

							$unitPrice = commaToDot(post("product")["new"]["price"][$index]);
							$quantity = post("product")["new"]["quantity"][$index];
							$totalPrice = $unitPrice * $quantity;

							$_productData = [
								"name" => post("product")["new"]["name"][$index],
								"quantity" => post("product")["new"]["quantity"][$index],
								"fkUnit" => post("product")["new"]["unit"][$index],
								"unitPrice" => $unitPrice,
								"totalPrice" => $totalPrice,
								"vatPercent" => post("product")["new"]["vat"][$index],
								"totalPriceWithVat" => includeVat($totalPrice, post("product")["new"]["vat"][$index]),
								"fkProduct" => $findProduct["productId"],
								"fkSale" => $saleID
							];

							$saleData["totalPrice"] += $_productData["totalPrice"];
							$saleData["totalVat"] += $_productData["totalPrice"] * $_productData["vatPercent"] / 100;
							$saleData["totalPriceWithVat"] += $_productData["totalPriceWithVat"];

							$this->SaleProductModel->insert($_productData);

//							$productData[] = $_productData;
						}

					}
				}
				$saleData["totalPrice"] = number_format($saleData["totalPrice"], 4, ".", "");
				$saleData["totalVat"] = number_format($saleData["totalVat"], 2, ".", "");
				$saleData["totalPriceWithVat"] = rounder(number_format($saleData["totalPriceWithVat"], 2, ".", ""));

				$saleData["balance"] = $findSale["balance"] - $findSale["totalPriceWithVat"] + $saleData["totalPriceWithVat"];
				// $saleData = array_merge($saleData, $collectData);

				$this->CustomerModel->decreaseBalance($findSale["totalPriceWithVat"], $findSale["fkCustomer"]);
				$this->CustomerModel->increaseBalance($saleData["totalPriceWithVat"], $findSale["fkCustomer"]);

				$updateSale = $this->SaleModel->update($saleData, $saleID);

				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
				} else {
					$this->db->trans_commit();
				}
				Logger::insert("EDIT_COLLECT", ["fkSale" => $saleID]);

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!");


				break;
			case "GET_BALANCE":
				$find = $this->SaleModel->first(post('saleID'));
				if ($find) {
					return $this->toJson(['status' => 1, 'balance' => showBalance($find['balance']), 'currency' => currency($find["fkCurrency"])]);
				}
				return $this->response();
				break;
			case "UPDATE_STATUS":

				$saleID = post('saleID');
				$statusID = post('statusID');

				$findSale = $this->SaleModel->first($saleID);
				if (!$findSale)
					return $this->response();

				if ($findSale['fkStatus'] == 4 || $findSale['fkStatus'] == 5) {

					$data = [
						'fkStatus' => $statusID
					];

					if ($statusID < 4)
						$data['approvedAt'] = null;

					$success = $this->SaleModel->update($data, $saleID);
				} else {
					$data = [
						'fkStatus' => $statusID
					];
					if ($statusID == 4 || $statusID == 5)
						$data['approvedAt'] = date('Y-m-d');

					$success = $this->SaleModel->update($data, $saleID);
				}

				if ($success)
					return $this->response(1, "Değişiklikler başarıyla kaydedildi!");

				return $this->response();
				break;
			case "CHANGE_USER":

				checkPerms('admin');

				$saleID = post('saleID');
				$userID = post('userID');
				$sale = $this->SaleModel->first($saleID);
				$customer = $this->CustomerModel->first($sale['fkCustomer']);
				$user = $this->UserModel->first($userID);
				if (!$user || !$sale || !$customer)
					return false;

				$success = $this->SaleModel->update(['fkUser' => $userID], $saleID);

				if ($success) {
					$message = '<b>' . $customer["name"] . '</b> isimli müşteriye ait bir satış sürecine görevli olarak atandınız. <br><b>Satış Numarası: </b>#' . $sale["invoiceNumber"] . '<br>
Sisteme giriş yaparak görüntülemek için <a href="' . base_url('sales/' . $saleID) . '">buraya</a> tıklayabilirsiniz.';

					if ($userID != $sale['fkUser']) {
						$this->npmailer->send($user['email'], 'OilsanCRM - Bilgilendirme', generateEmailBody($user, $message));
					}
					return $this->response(1, "Satış sorumlusu başarıyla güncellendi.");
				}

				return $this->response();
				break;
		}
	}

	public function ajax()
	{

		$searchableColumns = [
			"s.saleId",
			"c.name",
			"s.invoiceDate",
			"s.balance",
			"s.fkStatus",
			"c.phone"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE c.deletedAt IS NULL";
//		$filterCustomerGroupID = $this->input->post("customerGroupID");
//		if ($filterCustomerGroupID > 0) {
//			$whereSearch .= " AND c.fkCustomerGroup = '$filterCustomerGroupID'";
//		}


		if (post('statusID')) {
			$whereSearch .= " AND s.fkStatus = '" . post('statusID') . "'";
		}

		if (isCan('admin')) {
			if (post('userID')) {
				$whereSearch .= " AND s.fkUser = '" . post('userID') . "'";
			}
		} else {
			$whereSearch .= " AND s.fkUser = '" . Auth::get('userId') . "'";
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

		$list = $this->SaleModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->SaleModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->SaleModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			if (!$item["phone"]) {
				$item["phone"] = "";
			}

			$deleteLink = '';
			$customerViewLink = isCan("view-customer") ? base_url("customers/" . $item["customerId"]) : "javascript:void(0)";

			if (isCan('admin')) {
				if (isset($item['userFirstName']) && $item['userFirstName']) {
					$priColumn = '<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<span 
									   class="text-gray-600 mb-1">' . $item["userFirstName"] . ' ' . $item["userLastName"] . '</span>
									<span class="text-gray-500">' . $item["userEmail"] . '</span>
								</div></div>';
				} else {
					$priColumn = '<span class="badge badge-secondary">Yok</span>';
				}
			} else {
				$priColumn = localizeDate("d M Y H:i", $item["sUpdatedAt"]);
			}

			$viewLink = isCan("view-customer") ? base_url("customers/" . $item["customerId"]) : "javascript:void(0)";
			$customerName = $item["shortName"] ? $item["shortName"] . " - " . $item["name"] : $item["name"];
			$data[] = [
				"<span class='badge badge-sm badge-light-primary'>#" . $item["invoiceNumber"] . "</span>",
				'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="' . $customerViewLink . '"
									   class="text-gray-600 text-hover-primary mb-1">' . $customerName . '</a>
									<span class="text-gray-500">' . $item["email"] . '</span>
								</div></div>',
				convertDate($item["invoiceDate"]),
				$priColumn,
				'<span class="badge badge-' . $item["stClassName"] . '">' . $item["stTitle"] . '</span>',
				'<a href="' . base_url("sales/" . $item["saleId"]) . '"><button class="btn btn-light-primary btn-sm">İncele</button></a>
				
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

	public function test()
	{
		$str = $_GET["query"];
		echo '{
			"query": "Unit",
			"suggestions": [
				{ "value": "United Arab Emirates", "data": "AE" },
				{ "value": "United Kingdom",       "data": "UK" },
				{ "value": "United States",        "data": "US" }
			]
		}';
	}

	public function view($saleID)
	{

		$companyInformation = json_decode(config('companyInformation'), true);

		$data = [
			'company' => $companyInformation
		];
		$sale = $this->SaleModel->first($saleID);
		$data["sale"] = $sale;
		$data["products"] = $this->SaleProductModel->all(["fkSale" => $sale["saleId"]], "saleProductId ASC");
		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			$data["products"][$index]["item"] = $findProduct;
		}
		$data["customer"] = $this->CustomerModel->first($sale["fkCustomer"]);


		$this->render($data);
	}

	public function viewByPublic($invoiceNumber)
	{
		$this->setSubViewFolder("view");
		$companyInformation = json_decode(config('companyInformation'), true);

		$data = [
			'company' => $companyInformation
		];
		$sale = $this->SaleModel->first(['invoiceNumber' => $invoiceNumber]);
		$data["sale"] = $sale;
		$data["products"] = $this->SaleProductModel->all(["fkSale" => $sale["saleId"]], "saleProductId ASC");
		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			$data["products"][$index]["item"] = $findProduct;
		}
		$data["customer"] = $this->CustomerModel->first($sale["fkCustomer"]);


		$this->render($data);
	}

	public function paymentDetails($invoiceNumber)
	{
		$data = [];
		$sale = $this->SaleModel->first(['invoiceNumber' => $invoiceNumber]);
		if (!$sale) return $this->response();

		if ($sale["balance"] <= 0) return $this->response();


		return $this->toJson(["status" => 1, "data" => $data]);
	}

	public function madeOffer($saleID)
	{
		$sale = $this->SaleModel->first($saleID);
		$customer = $this->CustomerModel->first($sale['fkCustomer']);

		if (!$sale || !$customer)
			redirect(base_url());

		if (!isCan('admin') && $sale['fkUser'] != Auth::get('userId')) {
			redirect(base_url());
		}
		$companyInformation = json_decode(config('companyInformation'), true);

		$data = [
			'sale' => $sale,
			'customer' => $customer,
			'companyInformation' => $companyInformation
		];
		$data["products"] = $this->SaleProductModel->all(["fkSale" => $sale["saleId"]], "saleProductId ASC");
		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			$data["products"][$index]["item"] = $findProduct;
		}

		$this->render($data);
	}

	public function sendOffer($saleID)
	{

		$to = post('to');


		$sale = $this->SaleModel->first($saleID);
		$customer = $this->CustomerModel->first(@$sale['fkCustomer']);

		if (!$sale || !$customer)
			redirect(base_url());


		if (!isCan('admin') && $sale['fkUser'] != Auth::get('userId')) {
			redirect(base_url());
		}

		$emails = [];
		$bodyText = "Teklif dokümanı ektedir.";
		if ($to == 'self') {
			$emails = [Auth::get('email')];
			$bodyText = generateEmailBody(Auth::get(), "<b>#" . $sale['invoiceNumber'] . "</b> numaralı satışa ait güncel teklif dokümanı ekte yer alıyor.");
		} else if ($to == 'admin') {
			$users = $this->UserModel->all(['fkRole' => 1]);
			foreach ($users as $user) {
				$emails[] = $user['email'];
			}
			$bodyText = generateEmailBody(Auth::get(), "<b>#" . $sale['invoiceNumber'] . "</b> numaralı satışa ait güncel teklif dokümanı, <b>" . Auth::get('firstName') . " " . Auth::get('lastName') . "</b> tarafından gönderildi. Ekten ulaşabilirsiniz.");

		} else if ($to == 'staff') {
			$user = $this->UserModel->first($sale['fkUser']);
			$emails = [$user['email']];

			$bodyText = generateEmailBody(Auth::get(), "<b>#" . $sale['invoiceNumber'] . "</b> numaralı satışa ait güncel teklif dokümanı, <b>" . Auth::get('firstName') . " " . Auth::get('lastName') . "</b> tarafından gönderildi. Ekten ulaşabilirsiniz.");

		} else if ($to == 'customer') {
			$customer = $this->CustomerModel->first($sale['fkCustomer']);
			$emails = [$customer['email']];

			$bodyText = "Merhaba, ilgili teklif dokümanı ektedir.<br><br>Sevgiler.";

		}


		$companyInformation = json_decode(config('companyInformation'), true);

		$data = [
			'sale' => $sale,
			'customer' => $customer,
			'companyInformation' => $companyInformation,
			'sendToMails' => $emails,
			'bodyText' => $bodyText,
			'npmailer' => $this->npmailer,
			'subjectText' => 'Teklif Dokümanı'
		];

		$data["products"] = $this->SaleProductModel->all(["fkSale" => $sale["saleId"]], "saleProductId ASC");

		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			$data["products"][$index]["item"] = $findProduct;
		}

		$this->render($data);
	}
}
