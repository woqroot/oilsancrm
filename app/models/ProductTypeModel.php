<?php

class ProductTypeModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('productType');
	}
}
