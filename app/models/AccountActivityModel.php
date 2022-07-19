<?php

class AccountActivityModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("accountActivity");
		$this->load->model("AccountModel");
		$this->load->model("SaleModel");
	}

	public function accountActivities($accountID)
	{
		$result = [];
		$account = $this->AccountModel->first($accountID);
		if (!$account) return false;

		$all = $this->all(["fkAccount" => $accountID],"actionDate DESC, createdAt DESC");


		foreach ($all as $activity) {

			$item = [
				"accountActivityId" => $activity["accountActivityId"],
				"amount" => ($activity["type"] == "EXPENSE" ? "-" : "+") . showBalance($activity["amount"], $account["fkCurrency"]),
				"afterBalance" => showBalance($activity["afterAmount"], $account["fkCurrency"]),
				"type" => $activity["type"]
			];


			switch ($activity["target"]) {
				case "INITIAL":
					$item["actionDate"] = convertDate($activity["actionDate"]);
					$item["opponent"] = [];
					$item["explanation"] = "Hesap Açılış Bakiyesi";
					break;

				case "SALE_COLLECT":
					$sale = $this->SaleModel->first($activity["fkSale"]);

					$item["actionDate"] = convertDate($activity["actionDate"]);
					$item["opponent"] = [];
					$item["explanation"] = "#" . $sale["invoiceNumber"] . " Fatura ödemesi";
					break;

				case "DELETE_COLLECT":

					$sale = $this->SaleModel->first($activity["fkSale"]);

					$customer = $this->CustomerModel->first($activity["fkCustomer"]);

					$item["actionDate"] = convertDate($activity["actionDate"]);
					$item["opponent"] = [];
					$item["explanation"] = $sale ? "#".$sale["invoiceNumber"]." Faturadan silinen tahsilat" : "Müşteriden silinen tahsilat";
					break;
			}


			$result[] = $item;
		}

		return $result;
	}
}
