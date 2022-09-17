<?php

class TrialProductModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("trialProduct");
	}

	public function list($whereString, $orderBy, $limit)
	{

		$stmt = $this->db->query("SELECT tp.*,u.firstName AS userFirstName,u.lastName AS userLastName,p.name,un.name AS unitName,c.name AS customerName,s.invoiceNumber,u.email AS userEmail FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy
		LEFT JOIN product AS p ON p.productId = tp.fkProduct
		LEFT JOIN unit AS un ON un.unitId = tp.fkUnit
		LEFT JOIN customer AS c ON c.customerId = tp.fkCustomer
		LEFT JOIN sale AS s ON s.saleId = tp.fkSale

		{$whereString} {$orderBy} {$limit}");
		return $stmt->result_array();
	}

	public function countRecords($whereString, $orderBy, $limit = null)
	{
		$stmt = $this->db->query("SELECT tp.*,u.firstName,u.lastName,p.name FROM trialProduct AS tp
		LEFT JOIN user AS u ON u.userId = tp.createdBy 
    	LEFT JOIN product AS p ON p.productId = tp.fkProduct
        LEFT JOIN unit AS un ON un.unitId = tp.fkUnit
		LEFT JOIN customer AS c ON c.customerId = tp.fkCustomer
		LEFT JOIN sale AS s ON s.saleId = tp.fkSale
		{$whereString} {$orderBy} {$limit}");
		return $stmt->num_rows();
	}
}
