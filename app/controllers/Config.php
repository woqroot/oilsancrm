<?php

class Config extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ConfigModel");
		checkPerms("manage-settings");
	}

	public function view()
	{
		$this->setBreadcrumb("Sistem Ayarları");

		$all = $this->ConfigModel->getAll();

		$data = [
			"configs" => $all
		];
		$this->render($data);
	}

	public function update()
	{
		switch (post("__heading")) {
			case "GENERAL":

				$fields = ["title"];

				$data = [];
				foreach ($_POST as $key => $val) {
					if (in_array($key, $fields)) {
						$data[$key] = $val;
					}
				}

				$success = $this->ConfigModel->save($data);

				break;

			default:
				$success = false;
				break;
		}

		if ($success) return $this->response(1, "Değişiklikler başarıyla kaydedildi!");

		return $this->response();
	}

}
