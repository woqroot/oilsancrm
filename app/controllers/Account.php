<?php

class Account extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("AccountModel");
		$this->load->model("AccountActivityModel");
	}

	public function list()
	{
		$this->setBreadcrumb(["Kasa & Bankalar"]);

		$banks = [];
		foreach (getBanks() as $getBank) {
			$banks[$getBank["bankId"]] = $getBank;
		}

		$data = [
			"accounts" => $this->AccountModel->all(),
			"banks" => $banks,
			"currencies" => $this->CurrencyModel->all([], "currencyId")
		];
		$this->render($data);
	}

	public function details($id)
	{
		$find = $this->AccountModel->first($id);
		if (!$find) redirect();

		$activities = $this->AccountActivityModel->accountActivities($id);

		$data = [
			"account" => $find,
			"activities" => $activities
		];

		$this->setBreadcrumb(["Kasa & Bankalar", $find["name"]]);

		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$name = post("name");
				$type = post("accountType");
				$fkCurrency = post("currencyID");

				$bankID = post("bankID");
				$bankBranch = post("bankBranch");
				$bankIBAN = post("bankIBAN");
				$bankAccountNumber = post("bankAccountNumber");

				$initialBalance = clearDecimal(post("initialBalance"));

				$data = [
					"name" => $name,
					"type" => $type,
					"fkCurrency" => $fkCurrency,
					"initialBalance" => $initialBalance,
					"balance" => $initialBalance
				];

				if ($type == "BANK") {
					$data["fkBank"] = $bankID;
					$data["bankBranch"] = $bankBranch;
					$data["bankIBAN"] = $bankIBAN;
					$data["bankAccountNumber"] = $bankAccountNumber;
				}
				$success = $this->AccountModel->insert($data);
				if (!$success) return $this->response();

				if ($initialBalance > 0) {
					$activityData = [
						"type" => "INCOME",
						"target" => "INITIAL",
						"amount" => $initialBalance,
						"beforeAmount" => 0,
						"afterAmount" => $initialBalance,
						"fkAccount" => $success["accountId"]
					];

					$insert = $this->AccountActivityModel->insert($activityData);
				}

				return $this->response(1, "Hesap başarıyla oluşturuldu!");
				break;

			case "EDIT":

				$id = post("id");
				$find = $this->AccountModel->first($id);
				if (!$find) return false;

				$name = post("name");

				$bankID = post("bankID");
				$bankBranch = post("bankBranch");
				$bankIBAN = post("bankIBAN");
				$bankAccountNumber = post("bankAccountNumber");

				$data = [
					"name" => $name
				];

				if ($find["type"] == "BANK") {
					$data["fkBank"] = $bankID;
					$data["bankBranch"] = $bankBranch;
					$data["bankIBAN"] = $bankIBAN;
					$data["bankAccountNumber"] = $bankAccountNumber;
				}
				$success = $this->AccountModel->update($data, $id);
				if (!$success) return $this->response();

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!");
				break;

			case "FIND":
				$id = post("id");
				$data = $this->AccountModel->findById($id);
				if ($data) {
					$data["initialBalance"] = str_replace(".", ",", $data["initialBalance"]);
					return $this->toJson(["status" => 1, "data" => $data]);
				}
				return $this->toJson(["status" => 0]);
				break;
			case "FIND_BY_CURRENCY":

				$currencyID = post("currencyID");

				$data = $this->AccountModel->all(["fkCurrency" => $currencyID]);

				return $this->toJson(["status" => 1, "data" => $data]);


				break;


			case "DELETE":
				$id = post("id");
				$data = $this->AccountModel->findById($id);
				if (!$data) $this->response();

				if ($data["balance"] > 0) {
					return $this->response(0, "Hesabın <b>" . showBalance($data["balance"], $data["fkCurrency"]) . "</b> güncel (açık) bakiyesi olduğundan silinemedi.");
				}

				$delete = $this->AccountModel->delete($id);
				if (!$delete) return $this->response();
				return $this->response(1, "Hesap başarıyla silindi!");
				break;
		}
	}


}
