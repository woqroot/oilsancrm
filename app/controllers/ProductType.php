<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductType extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ProductTypeModel");
		$this->load->model("ProductModel");
	}

	public function list()
	{
		$all = $this->ProductTypeModel->all();

		$productTypes = [];

		foreach ($all as $item) {
			$item["countProduct"] = $this->ProductModel->count(["fkProductType" => $item["productTypeId"]]);
			$productTypes[] = $item;
		}

		$data = [
			"productTypes" => $productTypes
		];

		$this->setBreadcrumb(["Ürünler","Ürün Tipleri"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductTypeModel->insert($data);
				$lastID = $this->ProductTypeModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Marka başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->ProductTypeModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductTypeModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				$id = post("id");

				$success = $this->ProductTypeModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
