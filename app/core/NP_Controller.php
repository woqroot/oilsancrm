<?php


class NP_Controller extends CI_Controller
{
	protected $viewFolder = "";
	protected $subViewFolder = NULL;
	protected $guestPages = ["auth/login"];
	protected $breadcrumb = [
		"map" => [],
		"current" => ""
	];
	protected $sideBar = [];

	public function __construct()
	{

		parent::__construct();
		$this->setViewFolder($this->router->fetch_class());
		$this->setSubViewFolder($this->router->fetch_method());
		//


		if (!isLogin() and !in_array(uri_string(), $this->guestPages)) {

			redirect("auth/login");
			exit;
		}


	}


	/**
	 * @param mixed $viewFolder
	 */
	public function setViewFolder($viewFolder)
	{
		$this->viewFolder = $viewFolder;
	}

	/**
	 * @param mixed $subViewFolder
	 */
	public function setSubViewFolder($subViewFolder)
	{
		$this->subViewFolder = $subViewFolder;
	}

	public function render($params = [], $fileName = "index", $return = false)
	{

		if (is_null($this->subViewFolder)) {
			$bt = debug_backtrace();
			$this->setSubViewFolder($bt[0]["object"]->router->method);
		}

		$params["CI"] =& get_instance();
		$params["_breadcrumb"] = $this->breadcrumb ? $this->breadcrumb : [];
		$this->load->view($this->viewFolder . "/" . $this->subViewFolder . "/" . $fileName, $params, $return);
	}

	public function loadLayout($fileName)
	{
		$this->load->view("static/" . $fileName);
	}

	public function loadContent()
	{
		$bt = debug_backtrace();

		$this->load->view($this->viewFolder . "/" . $this->subViewFolder . "/content.php");

	}

	public function toJson(array $data, $return = false)
	{
		header("Content-type: application/json");
		if (!$return) {
			echo json_encode($data);
			return;
		}
		return json_encode($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("giris-yap");
	}

	/**
	 * @param array|string $var
	 */
	public function setBreadcrumb($var)
	{
		$this->breadcrumb["map"] = [];
		if (is_array($var)) {
			$counter = 0;
			foreach ($var as $index => $item) {
				$this->breadcrumb["map"][] = $item;
				$counter++;
				if ($counter == count($var)) {
					$this->breadcrumb["current"] = $item;
				}
			}
			return;
		}

		$this->breadcrumb["map"] = [$var];
		$this->breadcrumb["current"] = $var;
	}

	public function loadCustomJs($fileName = "main")
	{
		$controllerName = $this->viewFolder;

		echo '<script src="' . public_url("assets/js/modules/" . strtolower($controllerName) . "/" . $fileName) . '.js?v=' . time() . '"></script>';
	}

	public function response($status = 0, $message = "Bir hata oluştu...", $others = []): bool
	{
		$response = [
			"status" => $status,
			"message" => $message
		];
		if ($others) {
			foreach ($others as $key => $other) {
				$response[$key] = $other;
			}
		}

		echo json_encode(
			$response
		);

		return true;
	}

}
