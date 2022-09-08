<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductPack extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ProductPackModel");
		$this->load->model("ProductModel");
	}

	public function list()
	{
		$all = $this->ProductPackModel->all();

		$productPacks = [];

		foreach ($all as $item) {
			$item["countProduct"] = $this->ProductModel->count(["fkProductPack" => $item["productPackId"]]);
			$productPacks[] = $item;
		}

		$data = [
			"productPacks" => $productPacks
		];

		$this->setBreadcrumb(["Ürünler","Ambalaj Çeşitleri"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductPackModel->insert($data);
				$lastID = $this->ProductPackModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Marka başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->ProductPackModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->ProductPackModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				$id = post("id");

				$success = $this->ProductPackModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
