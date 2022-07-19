<?php

class BankModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("bank");
	}
}
