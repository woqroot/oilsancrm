<?php

class Payment extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("PaymentModel");
		$this->load->model("AccountActivityModel");
		$this->load->model("ExpenseModel");
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":
//				checkPerms("add-payment");
				$isPaid = post("isPaid");
				if (!post("amount") || !post("paymentDate")) return $this->response(0, "Validation failed.");

				if (post("expenseID")) {
					$findExpense = $this->ExpenseModel->first(post("expenseID"));
					if (!$findExpense) return $this->response(0, "Fatura bulunamadı.");
				}

				$this->db->trans_begin();
				$paymentData = [
					"amount" => commaToDot(post("amount")) ?: null,
					"paymentDate" => reLocalizeDate(post("paymentDate")) ?: null,
					"explanation" => post("explanation") ?: null,
					"fkSupplier" => post("supplierID") ?: null,
					"fkCurrency" => post("currencyID") ?: null,
					"fkAccount" => $isPaid && post("accountID") ?: null,
					"fkExpense" => post("expenseID") ?: null,
					"status" => $isPaid ? "PAID" : "PENDING"
				];


				if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
					$paymentData["fileName"] = upload_file("fileName", "payment-documents");
				}

				$payment = $this->PaymentModel->insert($paymentData);

				if ($payment) {
					Logger::insert("ADD_PAYMENT", ["fkExpense" => $payment["fkExpense"], "fkPayment" => $payment["paymentId"]]);

					if ($isPaid) {
						AccountManager::set($paymentData["fkAccount"])
							->targetId($payment["paymentId"])
							->expensePayment($paymentData["paymentDate"], $paymentData["amount"], $paymentData["fkExpense"], $paymentData["fkSupplier"]);
					}
				}
				$this->ExpenseModel->updateLastActionDate($findExpense["expenseId"]);
				if ($this->db->trans_status() == FALSE) {
					$this->db->trans_rollback();
					return $this->response();
				} else {
					$this->db->trans_commit();
					return $this->response(1, "Tahsilat başarıyla kaydedildi.");
				}
				break;
			case "EDIT":
//				checkPerms("edit-payment");
				$editable = true;
				if (!post("expenseID") || !post("paymentID")) return $this->response();


				$isPaid = post("isPaid");

				$findPayment = $this->PaymentModel->first(post("paymentID"));
				$findExpense = $this->ExpenseModel->first(post("expenseID"));
				$findSupplier = $this->SupplierModel->first(post("supplierID"));
				$findAccount = $this->AccountModel->first($findPayment["fkAccount"]);
				$findAccountActivity = $this->AccountActivityModel
					->first(
						[
							"fkAccount" => $findPayment["fkAccount"],
							"target" => "EXPENSE_PAYMENT",
							"targetId" => $findPayment["paymentId"]
						]
					);

				$last = $this->AccountActivityModel->last(["fkAccount" => $findPayment["fkAccount"]]);
				if ($findPayment["status"] == "PAID") {
					if ($last["target"] != "EXPENSE_PAYMENT" || $findPayment["paymentId"] != $last["targetId"]) $editable = false;
				}
				if ($editable) {


					if (!$findExpense || !$findPayment) return $this->response();

					$newAmount = clearDecimal(post("amount"));

					$this->db->trans_begin();
					if ($findPayment["status"] == "PAID") {

						if (!$findAccountActivity && $isPaid) return $this->response(0, "Hesap hareketi bulunamadı.");

						$updateData = [
							"amount" => $newAmount,
							"afterAmount" => $findAccountActivity["afterAmount"] - $findPayment["amount"] + $newAmount,
						];
						$this->AccountActivityModel->update($updateData, $findAccountActivity["accountActivityId"]);

						$updateData = [
							"balance" => $findAccount["balance"] - $findPayment["amount"] + $newAmount
						];
						$this->AccountModel->update($updateData, $findAccount["accountId"]);

						if($findSupplier){
							$updateData = [
								"balance" => $findSupplier["balance"] + $findPayment["amount"] - $newAmount
							];
							$this->SupplierModel->update($updateData, $findSupplier["supplierId"]);

						}

						$updateData = [
							"balance" => $findExpense["balance"] + $findPayment["amount"] - $newAmount
						];
						$this->ExpenseModel->update($updateData, $findExpense["expenseId"]);

						$updateData = [
							"amount" => $newAmount,
							"explanation" => post("explanation")
						];
						if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
							$updateData["fileName"] = upload_file("fileName", "payment-documents");
						}
						$this->PaymentModel->update($updateData, $findPayment["paymentId"]);

					} else {
						if ($isPaid) {

							if (!post("accountID")) return $this->response(0, "Kasa/hesap seçimi yapmalısınız.");

							AccountManager::set(post("accountID"))
								->targetId($findPayment["paymentId"])
								->expensePayment(post("paymentDate"), clearDecimal(post("amount")), $findPayment["fkExpense"], $findPayment["fkSupplier"]);

							$updateData = [
								"amount" => $newAmount,
								"explanation" => post("explanation"),
								"paymentDate" => reLocalizeDate(post("paymentDate")),
								"status" => "PAID",
								"fkAccount" => post("accountID")
							];
							if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
								$updateData["fileName"] = upload_file("fileName", "payment-documents");
							}
							$this->PaymentModel->update($updateData, $findPayment["paymentId"]);

						} else {
							$updateData = [
								"amount" => $newAmount,
								"explanation" => post("explanation"),
								"paymentDate" => reLocalizeDate(post("paymentDate"))
							];
							if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
								$updateData["fileName"] = upload_file("fileName", "payment-documents");
							}
							$this->PaymentModel->update($updateData, $findPayment["paymentId"]);
						}
					}

					if ($this->db->trans_status() == FALSE) {
						$this->db->trans_rollback();
						return $this->response();
					} else {
						$this->db->trans_commit();
						Logger::insert("EDIT_PAYMENT", ["fkExpense" => $findPayment["fkExpense"], "fkPayment" => $findPayment["paymentId"]]);

						return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
					}

				} else {

					$updateData = [
						"explanation" => post("explanation")
					];

					if (isset($_FILES["fileName"]["tmp_name"]) && $_FILES["fileName"]["tmp_name"]) {
						$updateData["fileName"] = upload_file("fileName", "payment-documents");
					}
					$success = $this->PaymentModel->update($updateData, $findPayment["paymentId"]);
					if ($success) {
						Logger::insert("EDIT_PAYMENT", ["fkExpense" => $findPayment["fkExpense"], "fkPayment" => $findPayment["paymentId"]]);

						return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
					}
					return $this->response();

				}

				break;
			case "DELETE":

				$paymentID = post("id");
				$findPayment = $this->PaymentModel->first($paymentID);
				if (!$findPayment) return $this->response();

				$options = [
					"fkExpense" => $findPayment["fkExpense"],
					"fkSupplier" => $findPayment["fkSupplier"],
				];

				$delete = $this->PaymentModel->delete($paymentID);
				if ($delete) {
					if($findPayment["status"] == "PAID"){
						$updateAccount = AccountManager::set($findPayment["fkAccount"])
							->targetId($paymentID)
							->deletePayment($findPayment["amount"], $options);

						if ($updateAccount) {
							Logger::insert("DELETE_PAYMENT", ["fkExpense" => $findPayment["fkExpense"], "fkPayment" => $findPayment["paymentId"]]);

						}
					}
					return $this->response(1, "Ödeme başarıyla silindi!");


				}

				return $this->response(0, "Hataa");


				break;
			case "FIND":
				$editable = true;
				$id = post("id");
				$data = $this->PaymentModel->first($id);
				if(!$data) return $this->response();
				if ($data["status"] == "PAID") {
					$last = $this->AccountActivityModel->last(["fkAccount" => $data["fkAccount"]]);
					if(!$last) return $this->response();
					if ($last["target"] != "EXPENSE_PAYMENT" || $data["paymentId"] != $last["targetId"] || !isCan('edit-payment')) $editable = false;
				}
				if ($data) {
					$data["amount"] = showBalance($data["amount"]);
					$data["paymentDate"] = localizeDate("d M Y", $data["paymentDate"]);
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
				$totalAmount = clearDecimal(post("totalAmount"));
				$periodCount = post("periodCount");
				if (post("autoPaymentType") == "INSTALLMENT") {
					$amountPerPeriod = (float)number_format($totalAmount / $periodCount, 2);
				} else {
					$periodAmount = clearDecimal(post("periodAmount"));
					$amountPerPeriod = $periodAmount;
				}
				$firstPaymentDate = reLocalizeDate(post("firstPaymentDate"));

				$result = [];


				if ($periodType == "weekly") {
					$prefix = "weeks";
				} else if ($periodType == "monthly") {
					$prefix = "months";
				} else if ($periodType == "yearly") {
					$prefix = "years";
				}
				$expenseID = post("expenseID");
				$expense = $this->ExpenseModel->first($expenseID);
				if (!$expense) return $this->response();
				$totalCalc = 0.00;
				$currency = currency($expense["fkCurrency"]);
				for ($i = 0; $i < $periodCount; $i++) {
					$amount = $amountPerPeriod;

					$_last = number_format($totalAmount - $totalCalc,2,".","");

					if (post("autoPaymentType") == "INSTALLMENT" && $i == $periodCount - 1 && $amount != $_last) {
						$amount = $totalAmount - $totalCalc;
						$higlight = true;
					} else {
						$higlight = false;
					}
					$result[] = [
						"date" => localizeDate("d M Y l", date("d-m-Y", strtotime("+" . $i . " " . $prefix, strtotime($firstPaymentDate)))),
						"amount" => number_format($amount, 2, ",", ".") . " " . $currency,
						"highlight" => $higlight
					];

					$totalCalc += $amount;
				}
//				"date" => localizeDate("d M Y",date("Y-m-d",strtotime($firstPaymentDate) + strtotime("+".$i." weeks")))

				$totalCalc = number_format($totalCalc, 2, ",", ".");
				return $this->toJson(["data" => $result, "total" => $totalCalc . " " . $currency]);
				break;
			case "ADD_BULK":
				$periodTypes = ["weekly", "monthly", "yearly"];

				$periodType = post("periodType");
				if (!in_array($periodType, $periodTypes)) return $this->response();
				$totalAmount = clearDecimal(post("totalAmount"));
				$periodCount = post("periodCount");
				if (post("autoPaymentType") == "INSTALLMENT") {
					$amountPerPeriod = (float)number_format($totalAmount / $periodCount, 2);
				} else {
					$periodAmount = clearDecimal(post("periodAmount"));
					$amountPerPeriod = $periodAmount;
				}
				$firstPaymentDate = reLocalizeDate(post("firstPaymentDate"));

				$result = [];


				if ($periodType == "weekly") {
					$prefix = "weeks";
				} else if ($periodType == "monthly") {
					$prefix = "months";
				} else if ($periodType == "yearly") {
					$prefix = "years";
				}
				$expenseID = post("expenseID");
				$expense = $this->ExpenseModel->first($expenseID);
				if (!$expense) return $this->response();
				$totalCalc = 0.00;
				$currency = currency($expense["fkCurrency"]);
				for ($i = 0; $i < $periodCount; $i++) {
					$amount = $amountPerPeriod;
					if (post("autoPaymentType") == "INSTALLMENT" && $i == $periodCount - 1 && $amount != $totalAmount - $totalCalc) {
						$amount = $totalAmount - $totalCalc;
						$higlight = true;
					} else {
						$higlight = false;
					}
					$result[] = [
						"date" => date("Y-m-d", strtotime("+" . $i . " " . $prefix, strtotime($firstPaymentDate))),
						"amount" => $amount
					];

					$totalCalc += $amount;
				}
//				"date" => localizeDate("d M Y",date("Y-m-d",strtotime($firstPaymentDate) + strtotime("+".$i." weeks")))

				$totalCalc = number_format($totalCalc, 2, ",", ".");

				$data = $result;
				$total = $totalCalc;

				$this->db->trans_begin();

				foreach ($data as $datum) {

					$paymentData = [
						"amount" => $datum["amount"],
						"paymentDate" => $datum["date"],
						"explanation" => "",
						"fkSupplier" => $expense["fkSupplier"],
						"fkCurrency" => $expense["fkCurrency"],
						"fkAccount" => null,
						"fkExpense" => $expense["expenseId"],
						"status" => "PENDING"
					];

					$this->PaymentModel->insert($paymentData);

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
			"p.paymentId",
			"p.paymentDate",
			"p.amount",
			"a.name",
			"p.explanation"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE p.deletedAt IS NULL";

		if (post("fkExpense")) {
			$whereSearch .= " AND fkExpense = '" . post("fkExpense") . "'";
		}

		if (post("fkSupplier")) {
			$whereSearch .= " AND fkSupplier = '" . post("fkSupplier") . "'";
		}
//		$filterSupplierGroupID = $this->input->post("supplierGroupID");
//		if ($filterSupplierGroupID > 0) {
//			$whereSearch .= " AND p.fkSupplierGroup = '$filterSupplierGroupID'";
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
			$orderBy = "ORDER BY p.paymentDate ASC, p.status DESC, p.createdAt ASC";
		}

		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->PaymentModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->PaymentModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->PaymentModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {
			$deleteLink = "";
			if ($item["status"] == "PENDING") {
				$paymentStatus = "Ödenmedi";
			} else {
				$paymentStatus = "Ödendi";
			}
//$item["accountName"]
			$data[] = [
				"<span data-id='" . $item["paymentId"] . "' class='badge badge-sm badge-light-primary'>#" . $item["paymentId"] . "</span>",
				convertDate($item["paymentDate"]),
				showBalance($item["amount"], $item["fkCurrency"]),
				$item["explanation"],
				"<span data-status='" . $item['status'] . "' class='badge badge-light-dark paymentStatus'>" . $paymentStatus . "</span>",
				'<span class="badge badge-sm badge-light-primary ' . hideByPerm('edit-payment') . '"><i class="fa fa-edit"></i></span>'
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
