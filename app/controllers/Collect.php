<?php

class Collect extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CollectModel");
		$this->load->model("AccountActivityModel");
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":
				checkPerms("add-collect");
				$isCollected = post("isCollected");

				if($isCollected && !post("accountID")) return $this->response(0,"Geçerli bir kasa/banka seçimi yapmalısınız.");
				if (!post("amount") || !post("collectDate")) return $this->response(0, "Validation failed.");

				if (post("saleID")) {
					$findSale = $this->SaleModel->first(post("saleID"));
					if (!$findSale) return $this->response(0, "Fatura bulunamadı.");
				}

				$this->db->trans_begin();
				$collectData = [
					"amount" => commaToDot(post("amount")) ?: null,
					"collectDate" => reLocalizeDate(post("collectDate")) ?: null,
					"explanation" => post("explanation") ?: null,
					"fkCustomer" => post("customerID") ?: null,
					"fkCurrency" => post("currencyID") ?: null,
					"fkAccount" => post("accountID") ?: null,
					"fkSale" => post("saleID") ?: null,
					"status" => $isCollected ? "PAID" : "PENDING"
				];


				if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
					$collectData["fileName"] = upload_file("fileName", "collect-documents");
				}

				$collect = $this->CollectModel->insert($collectData);

				if ($collect) {
					Logger::insert("ADD_COLLECT", ["fkSale" => $collect["fkSale"], "fkCollect" => $collect["collectId"]]);

					if ($isCollected) {
						AccountManager::set($collectData["fkAccount"])
							->targetId($collect["collectId"])
							->saleCollect($collectData["collectDate"], $collectData["amount"], $collectData["fkSale"], $collectData["fkCustomer"]);

					}
				}

				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
					return $this->response();
				} else {
					$this->db->trans_commit();
					return $this->response(1, "Tahsilat başarıyla kaydedildi.");
				}
				break;
			case "EDIT":
//				checkPerms("edit-collect");
				$editable = true;
				if (!post("saleID") || !post("collectID")) return $this->response(2);

				$isCollected = post("isCollected");


				$findCollect = $this->CollectModel->first(post("collectID"));
				$findSale = $this->SaleModel->first(post("saleID"));
				$findCustomer = $this->CustomerModel->first(post("customerID"));
				$findAccount = $this->AccountModel->first($findCollect["fkAccount"]);
				$findAccountActivity = $this->AccountActivityModel
					->first(
						[
							"fkAccount" => $findCollect["fkAccount"],
							"target" => "SALE_COLLECT",
							"targetId" => $findCollect["collectId"]
						]
					);
				$last = $this->AccountActivityModel->last(["fkAccount" => $findCollect["fkAccount"]]);

				if ($findCollect["status"] == "PAID") {
					if ($last["target"] != "SALE_COLLECT" || $findCollect["collectId"] != $last["targetId"]) $editable = false;

				}
				if ($editable) {
					if (!$findSale || !$findCollect || !$findCustomer) return $this->response(3);


					$this->db->trans_begin();

					if ($findCollect["status"] == "PAID") {

						if (!$findAccountActivity) return $this->response(0, "Hesap hareketi bulunamadı.");

						$updateData = [
							"explanation" => post("explanation")
						];
						if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
							$updateData["fileName"] = upload_file("fileName", "collect-documents");
						}
						$this->CollectModel->update($updateData, $findCollect["collectId"]);
					} else {
						$newAmount = clearDecimal(post("amount"));
						if ($isCollected) {
							if (!post("accountID")) return $this->response(0, "Kasa/hesap seçimi yapmalısınız.");

							AccountManager::set(post("accountID"))
								->targetId($findCollect["collectId"])
								->saleCollect(post("collectDate"), clearDecimal(post("amount")), $findCollect["fkSale"], $findCollect["fkCustomer"]);

							$updateData = [
								"amount" => $newAmount,
								"explanation" => post("explanation"),
								"collectDate" => reLocalizeDate(post("collectDate")),
								"status" => "PAID",
								"fkAccount" => post("accountID")
							];
							if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
								$updateData["fileName"] = upload_file("fileName", "collect-documents");
							}
							$this->CollectModel->update($updateData, $findCollect["collectId"]);
						} else {
							$updateData = [
								"amount" => $newAmount,
								"explanation" => post("explanation"),
								"collectDate" => reLocalizeDate(post("collectDate"))
							];
							if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
								$updateData["fileName"] = upload_file("fileName", "collect-documents");
							}
							$this->CollectModel->update($updateData, $findCollect["collectId"]);
						}
					}


					if ($this->db->trans_status() == FALSE) {
						$this->db->trans_rollback();
						return $this->response();
					} else {
						$this->db->trans_commit();
						Logger::insert("EDIT_COLLECT", ["fkSale" => $findCollect["fkSale"], "fkCollect" => $findCollect["collectId"]]);

						return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
					}

				} else {

					$updateData = [
						"explanation" => post("explanation")
					];

					if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
						$updateData["fileName"] = upload_file("fileName", "collect-documents");
					}
					$success = $this->CollectModel->update($updateData, $findCollect["collectId"]);
					if ($success) {
						Logger::insert("EDIT_COLLECT", ["fkSale" => $findCollect["fkSale"], "fkCollect" => $findCollect["collectId"]]);

						return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
					}
					return $this->response();

				}

				break;
			case "DELETE":

				$collectID = post("id");
				$findCollect = $this->CollectModel->first($collectID);
				if (!$findCollect) return $this->response();

				$options = [
					"fkSale" => $findCollect["fkSale"],
					"fkCustomer" => $findCollect["fkCustomer"],
				];
				$this->db->trans_begin();
				$delete = $this->CollectModel->delete($collectID);
				if ($delete) {
					if($findCollect["status"] == "PAID"){
						AccountManager::set($findCollect["fkAccount"])
							->targetId($collectID)
							->deleteCollect($findCollect["amount"], $options);
					}

					Logger::insert("DELETE_COLLECT", ["fkSale" => $findCollect["fkSale"], "fkCollect" => $findCollect["collectId"]]);

				}
				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
					return $this->response(0, "Hataa");
				} else {
					$this->db->trans_commit();

					return $this->response(1, "Tahsilat başarıyla silindi!");
				}



				break;
			case "FIND":
				$editable = true;
				$id = post("id");
				$data = $this->CollectModel->first($id);
				if (!$data) return $this->response();

				$last = $this->AccountActivityModel->last(["fkAccount" => $data["fkAccount"]]);
//				if ($data["status"] == "PAID" || $last || $last["target"] != "SALE_COLLECT" && $data["collectId"] == $last["targetId"] || !isCan('edit-collect')) $editable = false;
				if ($data["status"] == "PAID" || !isCan('edit-collect')) $editable = false;
				if ($data) {
					$data["amount"] = showBalance($data["amount"]);
//					$data["collectDate"] = convertDate($data["collectDate"]);
					$data["collectDate"] = localizeDate("d M Y", $data["collectDate"]);

					$data["editable"] = $editable;
					if ($data["fileName"]) $data["fileName"] = uploads_url($data["fileName"]);


					return $this->toJson(["status" => 1, "data" => $data]);
				}
				return $this->toJson(["status" => 0]);
				break;
			case "ADD_BULK_PREVIEW":
				$periodTypes = ["weekly", "monthly", "yearly"];

				$periodType = post("periodType");
				if (!in_array($periodType, $periodTypes)) return $this->response();
				$totalAmount = floatval(clearDecimal(post("totalAmount")));
				$periodCount = post("periodCount");

				if (post("autoCollectType") == "INSTALLMENT") {
					$amountPerPeriod = number_format($totalAmount / $periodCount, 2, ".", "");
				} else {
					$periodAmount = clearDecimal(post("periodAmount"));
					$amountPerPeriod = $periodAmount;
				}

				$firstCollectDate = reLocalizeDate(post("firstCollectDate"));

				$result = [];


				if ($periodType == "weekly") {
					$prefix = "weeks";
				} else if ($periodType == "monthly") {
					$prefix = "months";
				} else if ($periodType == "yearly") {
					$prefix = "years";
				}
				$saleID = post("saleID");
				$sale = $this->SaleModel->first($saleID);
				if (!$sale) return $this->response();
				$totalCalc = 0.00;
				$currency = currency($sale["fkCurrency"]);

				for ($i = 0; $i < $periodCount; $i++) {
					$amount = $amountPerPeriod;

					$_last = number_format($totalAmount - $totalCalc, 2, ".", "");
					if (post("autoCollectType") == "INSTALLMENT" && $i == $periodCount - 1 && $amount != $_last) {
						$amount = $totalAmount - $totalCalc;
						$higlight = true;

					} else {
						$amount = $amountPerPeriod;
						$higlight = false;
					}
//					echo $amount." - - ".$totalAmount." --- ".$totalCalc."<br>";
					$result[] = [
						"date" => localizeDate("d M Y l", date("d-m-Y", strtotime("+" . $i . " " . $prefix, strtotime($firstCollectDate)))),
						"amount" => number_format($amount, 2, ",", ".") . " " . $currency,
						"highlight" => $higlight
					];

					$totalCalc += $amount;
					$totalCalc = number_format($totalCalc, 2, ".", "");
				}
//				"date" => localizeDate("d M Y",date("Y-m-d",strtotime($firstCollectDate) + strtotime("+".$i." weeks")))

				$totalCalc = number_format($totalCalc, 2, ",", ".");
				return $this->toJson(["data" => $result, "total" => $totalCalc . " " . $currency]);
				break;
			case "ADD_BULK":
				$periodTypes = ["weekly", "monthly", "yearly"];

				$periodType = post("periodType");
				if (!in_array($periodType, $periodTypes)) return $this->response();
				$totalAmount = clearDecimal(post("totalAmount"));
				$periodCount = post("periodCount");
				if (post("autoCollectType") == "INSTALLMENT") {
					$amountPerPeriod = (float)number_format($totalAmount / $periodCount, 2);
				} else {
					$periodAmount = clearDecimal(post("periodAmount"));
					$amountPerPeriod = $periodAmount;
				}
				$firstCollectDate = reLocalizeDate(post("firstCollectDate"));

				$result = [];


				if ($periodType == "weekly") {
					$prefix = "weeks";
				} else if ($periodType == "monthly") {
					$prefix = "months";
				} else if ($periodType == "yearly") {
					$prefix = "years";
				}
				$saleID = post("saleID");
				$sale = $this->SaleModel->first($saleID);
				if (!$sale) return $this->response();
				$totalCalc = 0.00;
				$currency = currency($sale["fkCurrency"]);
				for ($i = 0; $i < $periodCount; $i++) {
					$amount = $amountPerPeriod;
					if (post("autoCollectType") == "INSTALLMENT" && $i == $periodCount - 1 && $amount != $totalAmount - $totalCalc) {
						$amount = $totalAmount - $totalCalc;
						$higlight = true;
					} else {
						$higlight = false;
					}
					$result[] = [
						"date" => date("Y-m-d", strtotime("+" . $i . " " . $prefix, strtotime($firstCollectDate))),
						"amount" => $amount
					];

					$totalCalc += $amount;
				}
//				"date" => localizeDate("d M Y",date("Y-m-d",strtotime($firstCollectDate) + strtotime("+".$i." weeks")))

				$totalCalc = number_format($totalCalc, 2, ",", ".");

				$data = $result;
				$total = $totalCalc;

				$this->db->trans_begin();

				foreach ($data as $datum) {

					$collectData = [
						"amount" => $datum["amount"],
						"collectDate" => $datum["date"],
						"explanation" => "",
						"fkCustomer" => $sale["fkCustomer"],
						"fkCurrency" => $sale["fkCurrency"],
						"fkAccount" => null,
						"fkSale" => $sale["saleId"],
						"status" => "PENDING"
					];

					$this->CollectModel->insert($collectData);

				}

				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
					return $this->response();
				} else {
					$this->db->trans_commit();
					return $this->response(1, "Ödeme planı başarıyla kaydedildi.");
				}
				break;
		}
	}

	public function ajax()
	{

		$searchableColumns = [
			"c.collectId",
			"c.collectDate",
			"c.amount",
			"a.name",
			"c.explanation"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE c.deletedAt IS NULL";

		if (post("fkSale")) {
			$whereSearch .= " AND fkSale = '" . post("fkSale") . "'";
		}

		if (post("fkCustomer")) {
			$whereSearch .= " AND fkCustomer = '" . post("fkCustomer") . "'";
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
			$orderBy = "ORDER BY c.collectDate DESC, c.createdAt DESC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->CollectModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->CollectModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->CollectModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";
			if ($item["status"] == "PENDING") {
				$collectStatus = "Ödenmedi";
			} else {
				$collectStatus = "Ödendi";
			}
			$data[] = [
				"<span data-id='" . $item["collectId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["collectId"] . "</span>",
				convertDate($item["collectDate"]),
				showBalance($item["amount"], $item["fkCurrency"]),
				$item["explanation"],
				"<span data-status='" . $item['status'] . "' class='badge badge-light-dark collectStatus'>" . $collectStatus . "</span>",
				'<span class="badge badge-sm badge-light-primary ' . hideByPerm('edit-collect') . '"><i class="fa fa-edit"></i></span>'
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
}
