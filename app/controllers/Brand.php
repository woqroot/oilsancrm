<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("BrandModel");
		$this->load->model("ProductModel");
	}

	public function list()
	{
		$all = $this->BrandModel->all();

		$brands = [];

		foreach ($all as $item) {
			$item["countProduct"] = $this->ProductModel->count(["fkBrand" => $item["brandId"]]);
			$brands[] = $item;
		}

		$data = [
			"brands" => $brands
		];

		$this->setBreadcrumb(["Ürünler","Markalar"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->BrandModel->insert($data);
				$lastID = $this->BrandModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Marka başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->BrandModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->BrandModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				$id = post("id");

				$success = $this->BrandModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
