<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sector extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SectorModel");
		$this->load->model("CustomerModel");

	}

	public function list()
	{
		$all = $this->SectorModel->all();

		$sectors = [];

		foreach ($all as $item) {
			$item["countCustomer"] = $this->CustomerModel->count(["fkSector" => $item["sectorId"]]);
			$sectors[] = $item;
		}

		$data = [
			"sectors" => $sectors
		];

		$this->setBreadcrumb(["Müşteriler","Sektör Tanımları"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->SectorModel->insert($data);
				if (!$success) return $this->response();
				return $this->response(1, "Sektör kaydı başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->SectorModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->SectorModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				checkPerms('admin');
				$id = post("id");

				$success = $this->SectorModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
