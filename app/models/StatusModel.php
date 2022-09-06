<?php

class StatusModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("status");
	}

}
