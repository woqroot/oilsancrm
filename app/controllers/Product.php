<?php

class Product extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ProductModel");
		$this->load->model("StackActivityModel");
		$this->load->model("UnitModel");
	}

	public function list()
	{
		$this->setBreadcrumb(["Ürün & Hizmetler"]);
		$last = $this->ProductModel->last();
		if (!$last) $last["productId"] = 1;

		$defualtCode = "NP" . date("Y") . "0" . $last["productId"];

		$data = [
			"products" => $this->ProductModel->all(),
			"currencies" => $this->CurrencyModel->all(),
			"units" => $this->UnitModel->all([], "name ASC"),
			"defaultCode" => $defualtCode
		];
		$this->render($data);
	}

	public function details($id)
	{
//		$find = $this->ProductModel->first($id);
//		if(!$find) redirect();
//
//
//
//		$data = [
//			"account" => $find
//		];
//
//		$this->setBreadcrumb(["Kasa & Bankalar",$find["name"]]);
//
//		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				if (!in_array(post("vatPercent"), getVats())) return $this->response(0, "Geçerli bir KDV oranı seçmelisiniz.");
				$data = [
					"name" => post("name"),
					"productCode" => post("productCode"),
					"unitPrice" => clearDecimal(post("unitPrice")),
					"fkUnit" => post("unitID"),
					"fkCurrency" => post("currencyID"),
					"vatPercent" => intval(post("vatPercent")),
					"totalPrice" => includeVat(clearDecimal(post("unitPrice")),intval(post("vatPercent")))
				];

				if (post("productType") == "PRODUCT") {
					$data["type"] = "PRODUCT";
					$data["stockTracking"] = post("stockTracking");

					if (post("stockTracking") == "ACTIVE") {
						$data["initialStock"] = post("initialStock");
						$data["stock"] = post("initialStock");
					} else {
						$data["initialStock"] = 0;
						$data["stock"] = 0;
					}
				} else {
					$data["type"] = "SERVICE";
				}

				$success = $this->ProductModel->insert($data);
				if (!$success) return $this->response();

				if (isset($data["initialStock"]) && $data["initialStock"] > 0) {
					$activityData = [
						"type" => "IN",
						"amount" => $data["initialStock"],
						"afterStack" => $data["initialStock"],
						"fkProduct" => $success["productId"],
						"fkUser" => Auth::get("userId"),
						"explanation" => "Açılış Stok Miktarı"
					];

					$this->StackActivityModel->insert($activityData);
				}

				return $this->response(1, "Kayıt başarıyla oluşturuldu!");
				break;

			case "EDIT":

				$id = post("id");
				$find = $this->ProductModel->first($id);
				if (!$find) return false;

				$name = post("name");

				$data = [
					"name" => $name,
					"stockTracking" => post("stockTracking") ?: "PASSIVE",
					"productCode" => post("productCode"),
					"unitPrice" => clearDecimal(post("unitPrice")),
					"fkUnit" => post("unitID"),
					"fkCurrency" => post("currencyID"),
					"vatPercent" => intval(post("vatPercent")),
					"totalPrice" => includeVat(clearDecimal(post("unitPrice")))
				];


				$success = $this->ProductModel->update($data, $id);
				if (!$success) return $this->response();

				return $this->response(1, "Değişiklikler başarıyla kaydedildi!");
				break;

			case "FIND":
				$id = post("id");
				$data = $this->ProductModel->findById($id);
				if ($data) {
					$data["unitPrice"] = number_format($data["unitPrice"], 2, ",", ".");
					$data["currencySymbol"] = currency($data["fkCurrency"]);
					return $this->toJson(["status" => 1, "data" => $data]);
				}
				return $this->toJson(["status" => 0]);
				break;

			case "FIND_BY_NAME":
				$name = post("name");
				$data = $this->ProductModel->first(["name" => $name]);
				if ($data) {
					$data["unitPrice"] = number_format($data["unitPrice"], 2, ",", ".");
					$data["currencySymbol"] = currency($data["fkCurrency"]);
					$data["info"] = "<b>".$data["name"]."</b><br><b>KDV: </b>%".$data["vatPercent"]."<br><b>KDV Dahil: </b>".$data["totalPrice"]." ".$data["currencySymbol"]."<br>";
					if($data["type"] == "PRODUCT"){
						$data["info"] .= "<b>Stok Takip: </b>";
						$data["info"] .= $data["stockTracking"] == "ACTIVE" ? "Aktif <br><b>Güncel Stok: </b>".$data["stock"]." ".Main::unit($data["fkUnit"]) : "Pasif";

					}
					return $this->toJson(["status" => 1, "data" => $data]);
				}
				return $this->toJson(["status" => 0]);
				break;

			case "DELETE":
				$id = post("id");
				$data = $this->ProductModel->findById($id);
				if (!$data) $this->response();

				if ($data["balance"] > 0) {
					return $this->response(0, "Hesabın <b>" . showBalance($data["balance"], $data["fkCurrency"]) . "</b> güncel (açık) bakiyesi olduğundan silinemedi.");
				}

				$delete = $this->ProductModel->delete($id);
				if (!$delete) return $this->response();
				return $this->response(1, "Hesap başarıyla silindi!");
				break;
		}
	}

	public function search()
	{
		$suggestions = [];
		$query = $this->input->get("query");

		$results = $this->ProductModel->search($query);
		foreach ($results as $result) {
			$suggestions[] = [
				"value" => $result["name"],
				"data"  => $result["name"],
			];
		}
		return $this->toJson([
			"query" => $query,
			"suggestions" => $suggestions
		]);

	}


}
