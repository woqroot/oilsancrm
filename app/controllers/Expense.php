<?php

class Expense extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ExpenseModel");
		$this->load->model("CurrencyModel");
		$this->load->model("CustomerGroupModel");
		$this->load->model("UnitModel");
		$this->load->model("CollectModel");
		$this->load->model("PaymentModel");
		$this->load->model("CustomerModel");
		$this->load->model("SupplierModel");
		$this->load->model("ExpenseProductModel");
		$this->load->model("DocumentModel");
		$this->load->model("AccountModel");
		$this->load->model("ProductModel");
		$this->load->model("StackActivityModel");

	}

	public function list()
	{
		$this->setBreadcrumb("Giderler");

		$this->render();
	}

	public function ajax()
	{

		$searchableColumns = [
			"e.expenseId",
			"c.name",
			"e.invoiceDate",
			"e.balance"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE e.deletedAt IS NULL";

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
			$orderBy = "ORDER BY e.expenseId DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->ExpenseModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->ExpenseModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->ExpenseModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";

			if (!$item["phone"]) {
				$item["phone"] = "";
			}

			$deleteLink = '';
			$supplierViewLink = isCan("view-supplier") ? base_url("suppliers/" . $item["supplierId"]) : "javascript:void(0)";

			$showBalance = '<span class="badge badge-lg badge-light">' . showBalance($item["expenseBalance"], $item["fkCurrency"]) . '</span>';

			$viewLink = isCan("view-supplier") ? base_url("suppliers/" . $item["supplierId"]) : "javascript:void(0)";
			$supplierName = $item["shortName"] ? $item["shortName"] . " - " . $item["name"] : $item["name"];
			$data[] = [
				"<span class='badge badge-sm badge-light-primary'>#" . $item["invoiceNumber"] . "</span>",
				'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="' . $supplierViewLink . '"
									   class="text-gray-600 text-hover-primary mb-1">' . $supplierName . '</a>
									<span class="text-gray-500">' . $item["email"] . '</span>
								</div></div>',
				convertDate($item["invoiceDate"]),
				$showBalance,
				'<span class="badge badge-success">Ödeme Bekliyor</span>',
				'<a href="' . base_url("expenses/" . $item["expenseId"]) . '"><button class="btn btn-light-primary btn-sm">İncele</button></a>
				
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

	public function add()
	{

		$this->setBreadcrumb(["Giderler", "Yeni Oluştur"]);
		$data = [
			"currencies" => $this->CurrencyModel->all([], "currencyId"),
			"cities" => $this->CityModel->all([], "title ASC"),
			"units" => $this->UnitModel->all([], "name ASC")
		];

		$lastExpense = $this->ExpenseModel->last();
		$data["defaultInvoiceNumber"] = $lastExpense ? generateInvoiceNumber($lastExpense["expenseId"]) : generateInvoiceNumber();
		$this->render($data);
	}

	public function edit($id)
	{

		$expense = $this->ExpenseModel->first($id);
		if (!$expense) redirect("expenses");
		$data = [
			"units" => $this->UnitModel->all([], "name ASC"),
			"cities" => $this->CityModel->all()
		];


		$data["expense"] = $expense;
		$data["products"] = $this->ExpenseProductModel->all(["fkExpense" => $expense["expenseId"]], "expenseProductId ASC");
		foreach ($data["products"] as $index => $item) {
			$findProduct = $this->ProductModel->first($item["fkProduct"]);
			$data["products"][$index]["item"] = $findProduct;
		}
		$data["supplier"] = $this->SupplierModel->first($expense["fkSupplier"]);
		$data["currencies"] = $this->CurrencyModel->all();


		$this->setBreadcrumb("Gider Faturası Detay");
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":
				$findSupplier = $this->SupplierModel->first(post("supplierID"));
				$findCurrency = $this->CurrencyModel->first(post("fkCurrency"));
				$findAccount = $this->AccountModel->first(post("fkAccount"));

//				if (!$findSupplier) return $this->response(0, "Devam etmek için bir tedarikçi seçin.");
				if (!$findCurrency) return $this->response(0, "Geçerli bir döviz seçimi yapmalısınız.");
				if (post("isPaid") == 1 && (!$findAccount || $findAccount["fkCurrency"] != $findCurrency["currencyId"])) return $this->response(0, "Geçerli bir hesap seçimi yapmalısınız.");

				$expenseData = [
					"invoiceDate" => reLocalizeDate(post("invoiceDate")),
					"invoiceNumber" => post("invoiceNumber"),
					"fkSupplier" => post("supplierID"),
					"notes" => post("notes"),
					"fkCurrency" => post("fkCurrency")
				];


				$expenseData["totalPrice"] = 0;
				$expenseData["totalVat"] = 0;
				$expenseData["totalPriceWithVat"] = 0;
				$productData = [];
				$_countProduct = 0;
				$this->db->trans_begin();
				foreach ($_POST["product"]["name"] as $index => $item) {
					if (trim($item)) {
						$_countProduct++;
						$findProduct = $this->ProductModel->first(["name" => post("product")["name"][$index]]);
						if (!$findProduct) {
							$last = $this->ProductModel->last();
							if (!$last) $last["productId"] = 0;

							$defualtCode = "NP" . date("Y") . "0" . $last["productId"] + 1;
							$newProduct = [
								"type" => "PRODUCT",
								"stockTracking" => "PASSIVE",
								"initialStock" => 0,
								"stock" => 0,
								"name" => post("product")["name"][$index],
								"productCode" => $defualtCode,
								"unitPrice" => rounder(commaToDot(post("product")["price"][$index])),
								"fkUnit" => post("product")["unit"][$index],
								"fkCurrency" => $expenseData["fkCurrency"],
								"vatPercent" => post("product")["vat"][$index],
								"totalPrice" => includeVat(rounder(commaToDot(post("product")["price"][$index]), intval(post("product")["vat"][$index])))
							];


							$this->ProductModel->insert($newProduct);

							$findProduct = $this->ProductModel->first(["name" => post("product")["name"][$index]]);
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

							$expenseData["totalPrice"] += rounder($_productData["totalPrice"]);
							$expenseData["totalVat"] += rounder($_productData["totalPrice"]) * $_productData["vatPercent"] / 100;
							$expenseData["totalPriceWithVat"] += rounder($_productData["totalPriceWithVat"]);

//							$this->ExpenseProductModel->insert($productData);

							$productData[] = $_productData;

							if ($findProduct["stockTracking"] == "ACTIVE") {
								$this->StackActivityModel->increase($quantity,"xxx isimli müşteriden alış - #" . $expenseData["invoiceNumber"], $findProduct["productId"]);
							}
						}

					}
				}

				if ($_countProduct <= 0) {
					return $this->response(0, "En az 1 ürün/hizmet seçimi yapmalısınız.");
				}

				// $expenseData = array_merge($expenseData, $paymentData);
				if($findSupplier){
					$updateSupplierBalance = $this->SupplierModel->decreaseBalance($expenseData["totalPriceWithVat"], $findSupplier["supplierId"]);
				}

				$expenseData["totalPrice"] = rounder(number_format($expenseData["totalPrice"], 4, ".", ""));
				$expenseData["totalVat"] = rounder(number_format($expenseData["totalVat"], 2, ".", ""));
				$expenseData["totalPriceWithVat"] = rounder(number_format($expenseData["totalPriceWithVat"], 2, ".", ""));
				if (post("isPaid") == 1 && $updateSupplierBalance) {

					$paymentData = [
						"amount" => $expenseData["totalPriceWithVat"],
						"paymentDate" => reLocalizeDate(post("paymentDate")),
						"fkCurrency" => post("fkCurrency"),
						"fkAccount" => post("fkAccount"),
						"fkSupplier" => $expenseData["fkSupplier"],
						"status" => "PAID"
					];

				}

				$expenseData["balance"] = 0-$expenseData["totalPriceWithVat"];

				$insertExpense = $this->ExpenseModel->insert($expenseData);
				if ($insertExpense) {
					Logger::insert("ADD_EXPENSE", ["fkExpense" => $insertExpense["expenseId"]]);

					foreach ($productData as $productDatum) {
						$productDatum["fkExpense"] = $insertExpense["expenseId"];
						$this->ExpenseProductModel->insert($productDatum);
					}
					if (isset($paymentData)) {
						$paymentData["fkExpense"] = $insertExpense["expenseId"];

						$insertPayment = $this->PaymentModel->insert($paymentData);
						if ($insertPayment) {
							Logger::insert("ADD_PAYMENT", ["fkExpense" => $insertExpense["expenseId"], "fkPayment" => $insertPayment["paymentId"]]);

							AccountManager::set($paymentData["fkAccount"])
								->targetId($insertPayment["paymentId"])
								->expensePayment($paymentData["paymentDate"], $paymentData["amount"], $insertExpense["expenseId"], $insertExpense["fkSupplier"]);
						}
					}
					$ss = "x";
					if (isset($_FILES["invoiceDocument"]["tmp_name"]) && $_FILES["invoiceDocument"]["tmp_name"]) {
						$fileName = upload_file("invoiceDocument", "expense-documents");
						$data = [
							"name" => "Fatura Ek",
							"document" => $fileName,
							"fkExpense" => $insertExpense["expenseId"],
							"createdBy" => Auth::get("userId")
						];

						$this->DocumentModel->insert($data);
					}


				}
				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
				} else {
					$this->db->trans_commit();
				}
				return $this->response(1, "Satış kaydı başarıyla oluşturuldu!", ["data" => $insertExpense]);


				break;
			case "EDIT":

				$expenseID = post("expenseID");


				$findExpense = $this->ExpenseModel->first($expenseID);
				if (!$findExpense) $this->response(0, "Fatura bulunamadı...");

				$expenseData = [
					"invoiceDate" => reLocalizeDate(post("invoiceDate")),
					"invoiceNumber" => post("invoiceNumber"),
					"notes" => post("notes")
				];


				$expenseData["totalPrice"] = 0;
				$expenseData["totalVat"] = 0;
				$expenseData["totalPriceWithVat"] = 0;

				$_countProduct = 0;

				$nonDeletedProducts = [];
				$this->db->trans_begin();
				if (isset($_POST["product"]["old"]["expenseProductId"])) {
					foreach ($_POST["product"]["old"]["expenseProductId"] as $index => $item) {
						$nonDeletedProducts[] = $item;
						if (trim($item)) {
							$_countProduct++;
							$findProduct = $this->ProductModel->first(["name" => post("product")["old"]["expenseProductId"][$index]]);

							$unitPrice = commaToDot(post("product")["old"]["price"][$index]);
							$quantity = post("product")["old"]["quantity"][$index];
							$totalPrice = $unitPrice * $quantity;
							$totalPriceWithVat = includeVat($totalPrice, post("product")["old"]["vat"][$index]);
							$updateExpenseProductData = [
								"quantity" => post("product")["old"]["quantity"][$index],
								"fkUnit" => post("product")["old"]["unit"][$index],
								"unitPrice" => $unitPrice,
								"totalPrice" => $totalPrice,
								"vatPercent" => post("product")["old"]["vat"][$index],
								"totalPriceWithVat" => $totalPriceWithVat
							];

							$this->ExpenseProductModel->update($updateExpenseProductData, post("product")["old"]["expenseProductId"][$index]);

							$expenseData["totalPrice"] += $updateExpenseProductData["totalPrice"];
							$expenseData["totalVat"] += $updateExpenseProductData["totalPrice"] * $updateExpenseProductData["vatPercent"] / 100;
							$expenseData["totalPriceWithVat"] += $updateExpenseProductData["totalPriceWithVat"];
							$_countProduct++;

//							if ($findProduct["stockTracking"] == "ACTIVE") {
//								$this->StackActivityModel->decrease($quantity, "<b>" . $findSupplier['name'] . "</b> isimli müşteriye satış - #" . $expenseData["invoiceNumber"], $findProduct["productId"]);
//							}
						}
					}
				}

				foreach ($this->ExpenseProductModel->all(["fkExpense" => $expenseID]) as $item) {
					if (!in_array($item["expenseProductId"], $nonDeletedProducts)) {
						$this->ExpenseProductModel->delete($item["expenseProductId"]);
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
								"fkCurrency" => $findExpense["fkCurrency"],
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
								"fkExpense" => $expenseID
							];

							$expenseData["totalPrice"] += $_productData["totalPrice"];
							$expenseData["totalVat"] += $_productData["totalPrice"] * $_productData["vatPercent"] / 100;
							$expenseData["totalPriceWithVat"] += $_productData["totalPriceWithVat"];

							$this->ExpenseProductModel->insert($_productData);

//							$productData[] = $_productData;
						}

					}
				}
				$expenseData["totalPrice"] = number_format($expenseData["totalPrice"], 4, ".", "");
				$expenseData["totalVat"] = number_format($expenseData["totalVat"], 2, ".", "");
				$expenseData["totalPriceWithVat"] = rounder(number_format($expenseData["totalPriceWithVat"], 2, ".", ""));

				$expenseData["balance"] = $findExpense["balance"] + $findExpense["totalPriceWithVat"] - $expenseData["totalPriceWithVat"];
				// $expenseData = array_merge($expenseData, $paymentData);

				if($findExpense["fkSupplier"]){
					$this->SupplierModel->increaseBalance($findExpense["totalPriceWithVat"], $findExpense["fkSupplier"]);
					$this->SupplierModel->decreaseBalance($expenseData["totalPriceWithVat"], $findExpense["fkSupplier"]);

				}
				$updateExpense = $this->ExpenseModel->update($expenseData, $expenseID);

				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
				} else {
					$this->db->trans_commit();
				}

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!");


				break;
			case "GET_BALANCE":
				$find = $this->ExpenseModel->first(post('expenseID'));
				if ($find) {
					return $this->toJson(['status' => 1, 'balance' => showBalance($find['balance']), 'currency' => currency($find["fkCurrency"])]);
				}
				return $this->response();
				break;
		}
	}
}
