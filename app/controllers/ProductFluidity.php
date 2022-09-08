<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductFluidity extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ProductFluidityModel");
		$this->load->model("ProductModel");
	}

	public function list()
	{
		$all = $this->ProductFluidityModel->all();

		$productFluidities = [];

		foreach ($all as $item) {
			$item["countProduct"] = $this->ProductModel->count(["fkProductFluidity" => $item["productFluidityId"]]);
			$productFluidities[] = $item;
		}

		$data = [
			"productFluidities" => $productFluidities
		];

		$this->setBreadcrumb(["Ürünler","Akışkanlık Çeşitleri"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductFluidityModel->insert($data);
				$lastID = $this->ProductFluidityModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Marka başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->ProductFluidityModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductFluidityModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				$id = post("id");

				$success = $this->ProductFluidityModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
