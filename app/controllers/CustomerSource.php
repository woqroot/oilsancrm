<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerSource extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CustomerSourceModel");
		$this->load->model("CustomerModel");

	}

	public function list()
	{
		$all = $this->CustomerSourceModel->all();

		$customerSources = [];

		foreach ($all as $item) {
			$item["countCustomer"] = $this->CustomerModel->count(["fkCustomerSource" => $item["customerSourceId"]]);
			$customerSources[] = $item;
		}

		$data = [
			"customerSources" => $customerSources
		];

		$this->setBreadcrumb(["Müşteriler","Kaynak Tanımları"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->CustomerSourceModel->insert($data);
				$lastID = $this->CustomerSourceModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Referans/kaynak başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->CustomerSourceModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->CustomerSourceModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				checkPerms('admin');
				$id = post("id");

				$success = $this->CustomerSourceModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
