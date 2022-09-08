<?php

class ProductFluidityModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('productFluidity');
	}
}
