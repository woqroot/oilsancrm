<?php

class BrandModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('brand');
	}
}
