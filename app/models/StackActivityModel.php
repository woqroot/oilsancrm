<?php

class StackActivityModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("stackActivity");
		$this->load->model("ProductModel");
	}

	public function decrease($quantity, $explanation, $productID)
	{
		$old = $this->ProductModel->first($productID);
		$afterStack = $old["stock"] - $quantity;

		$success = $this->db->query("UPDATE product SET stock = '{$afterStack}' WHERE productId = '{$productID}'");
		if($success){
			$find = $this->ProductModel->first($productID);
			$activityData = [
				"type" => "OUT",
				"amount" => $quantity,
				"afterStack" => $find["stock"],
				"fkProduct" => $productID,
				"fkUser" => Auth::get("userId"),
				"explanation" => $explanation
			];

			$this->insert($activityData);
		}
		return;
	}

	public function increase($quantity, $explanation, $productID)
	{
		$old = $this->ProductModel->first($productID);
		$afterStack = $old["stock"] + $quantity;

		$success = $this->db->query("UPDATE product SET stock = '{$afterStack}' WHERE productId = '{$productID}'");
		if($success){
			$find = $this->ProductModel->first($productID);
			$activityData = [
				"type" => "IN",
				"amount" => $quantity,
				"afterStack" => $find["stock"],
				"fkProduct" => $productID,
				"fkUser" => Auth::get("userId"),
				"explanation" => $explanation
			];

			$this->insert($activityData);
		}
		return;
	}
}
