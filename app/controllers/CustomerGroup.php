<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerGroup extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CustomerGroupModel");
		$this->load->model("CustomerModel");
	}

	public function list()
	{
		$all = $this->CustomerGroupModel->all();

		$customerGroups = [];

		foreach ($all as $item) {
			$item["countCustomer"] = $this->CustomerModel->count(["fkCustomerGroup" => $item["customerGroupId"]]);
			$customerGroups[] = $item;
		}

		$data = [
			"customerGroups" => $customerGroups
		];

		$this->setBreadcrumb(["Müşteriler", "Müşteri Grupları"]);
		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				$data = [
					"title" => post("title")
				];

				$success = $this->CustomerGroupModel->insert($data);
				$lastID = $this->CustomerGroupModel->db->insert_id();
				if (!$success) return $this->response();
				return $this->response(1, "Müşteri grubu başarıyla oluşturuldu.",["data" => $success]);
				break;

			case "FIND":
				$id = post("id");

				return $this->toJson([
					"status" => 1,
					"data" => $this->CustomerGroupModel->findById($id)
				]);
				break;

			case "EDIT":

				$id = post("id");

				$data = [
					"title" => post("title")
				];

				$success = $this->CustomerGroupModel->update($data,$id);
				if (!$success) $this->response();
				return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				break;

			case "DELETE":
				$id = post("id");

				$success = $this->CustomerGroupModel->delete($id);
				if (!$success) $this->response();
				return $this->response(1, "Kayıt başarıyla silindi.");

				break;
		}
	}

}
