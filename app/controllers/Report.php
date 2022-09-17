<?php

class Report extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SaleModel');
		$this->load->model('UserModel');
		$this->load->model('CustomerModel');
		$this->load->model('TrialProductModel');
	}
}
