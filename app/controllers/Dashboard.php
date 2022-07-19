<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->setViewFolder(self::class);
	}

	public function index()
	{

		$this->setBreadcrumb(["Genel Bakış","Ana Sayfa"]);
		$this->setSubViewFolder("main");

		$this->render();
	}

}
