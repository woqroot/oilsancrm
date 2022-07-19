<?php

class AccountManager
{
	protected static $ci;
	protected static $instance = null;
	protected static $accountId;
	protected static $account;
	protected static $targetId = null;

	public function __construct()
	{
		self::$ci = get_instance();
		self::$ci->load->model("AccountModel");
		self::$ci->load->model("AccountActivityModel");
		self::$ci->load->model("CustomerModel");
		self::$ci->load->model("SupplierModel");
	}

	protected static function setAccount($account = null)
	{
		if ($account) {
			self::$account = $account;
		} else {
			self::$account = self::$ci->AccountModel->first(self::$accountId);
		}
		return new static();
	}

	public static function set($accountID)
	{
		$find = self::$ci->AccountModel->first($accountID);
		if (!$find) return false;
		self::$accountId = $accountID;
		self::setAccount($find);
		self::$targetId = null;
		return new self();
	}

	public function targetId($targetId)
	{
		self::$targetId = $targetId;
		return new self();
	}

	public function saleCollect($date, $amount, $saleID, $customerID)
	{

		$newBalance = self::$account["balance"] + $amount;

		$accountData = [
			"balance" => $newBalance,
			"lastUsedAt" => date("Y-m-d H:i:s")
		];

		self::$ci->db->trans_begin();
		if (self::$ci->AccountModel->update($accountData, self::$accountId)) {
			$activityData = [
				"type" => "INCOME",
				"target" => "SALE_COLLECT",
				"targetId" => self::$targetId,
				"actionDate" => $date,
				"amount" => $amount,
				"beforeAmount" => self::$account["balance"],
				"afterAmount" => $newBalance,
				"fkSale" => $saleID,
				"fkCustomer" => $customerID,
				"fkAccount" => self::$accountId
			];

			self::$ci->AccountActivityModel->insert($activityData);
			self::$ci->CustomerModel->decreaseBalance($activityData["amount"], $activityData["fkCustomer"]);
			self::$ci->SaleModel->decreaseBalance($activityData["amount"], $activityData["fkSale"]);
		}
		if (self::$ci->db->trans_status() == FALSE) {
			self::$ci->db->trans_rollback();
		} else {
			self::$ci->db->trans_commit();
		}

		return self::$ci->db->trans_status();


	}

	public function expensePayment($date, $amount, $expenseID, $supplierID)
	{

		$newBalance = self::$account["balance"] - $amount;

		$accountData = [
			"balance" => $newBalance,
			"lastUsedAt" => date("Y-m-d H:i:s")
		];

		self::$ci->db->trans_begin();
		if (self::$ci->AccountModel->update($accountData, self::$accountId)) {
			$activityData = [
				"type" => "INCOME",
				"target" => "SALE_COLLECT",
				"targetId" => self::$targetId,
				"actionDate" => $date,
				"amount" => $amount,
				"beforeAmount" => self::$account["balance"],
				"afterAmount" => $newBalance,
				"fkExpense" => $expenseID,
				"fkSupplier" => $supplierID ? $supplierID : null,
				"fkAccount" => self::$accountId
			];

			self::$ci->AccountActivityModel->insert($activityData);
			if($supplierID){
				self::$ci->SupplierModel->increaseBalance($activityData["amount"], $activityData["fkSupplier"]);
			}
			self::$ci->ExpenseModel->increaseBalance($activityData["amount"], $activityData["fkExpense"]);
		}
		if (self::$ci->db->trans_status() == FALSE) {
			self::$ci->db->trans_rollback();
		} else {
			self::$ci->db->trans_commit();
		}

		return self::$ci->db->trans_status();


	}

	public function deleteCollect($amount, $options = [])
	{

		$newBalance = self::$account["balance"] - $amount; // hatalı

		$accountData = [
			"balance" => $newBalance,
			"lastUsedAt" => date("Y-m-d H:i:s")
		];

		self::$ci->db->trans_begin();
		if (self::$ci->AccountModel->update($accountData, self::$accountId)) {
			$activityData = [
				"type" => "EXPENSE",
				"target" => "DELETE_COLLECT",
				"targetId" => self::$targetId,
				"actionDate" => date("Y-m-d"),
				"amount" => $amount,
				"beforeAmount" => self::$account["balance"],
				"afterAmount" => $newBalance,
				"fkAccount" => self::$accountId
			];

			$activityData = array_merge($activityData, $options);

			self::$ci->AccountActivityModel->insert($activityData);
			self::$ci->CustomerModel->increaseBalance($activityData["amount"], $activityData["fkCustomer"]);
			if($activityData["fkSale"]){
				self::$ci->SaleModel->increaseBalance($activityData["amount"], $activityData["fkSale"]);
			}
		}
		if (self::$ci->db->trans_status() == FALSE) {
			self::$ci->db->trans_rollback();
		} else {
			self::$ci->db->trans_commit();
		}
		return self::$ci->db->trans_status();

	}

	public function deletePayment($amount, $options = [])
	{

		$newBalance = self::$account["balance"] + $amount; // hatalı

		$accountData = [
			"balance" => $newBalance,
			"lastUsedAt" => date("Y-m-d H:i:s")
		];

		self::$ci->db->trans_begin();
		if (self::$ci->AccountModel->update($accountData, self::$accountId)) {
			$activityData = [
				"type" => "EXPENSE",
				"target" => "DELETE_PAYMENT",
				"targetId" => self::$targetId,
				"actionDate" => date("Y-m-d"),
				"amount" => $amount,
				"beforeAmount" => self::$account["balance"],
				"afterAmount" => $newBalance,
				"fkAccount" => self::$accountId
			];

			$activityData = array_merge($activityData, $options);

			self::$ci->AccountActivityModel->insert($activityData);
			self::$ci->SupplierModel->decreaseBalance($activityData["amount"], $activityData["fkSupplier"]);
			if($activityData["fkExpense"]){
				self::$ci->ExpenseModel->decreaseBalance($activityData["amount"], $activityData["fkExpense"]);
			}
		}
		if (self::$ci->db->trans_status() == FALSE) {
			self::$ci->db->trans_rollback();
		} else {
			self::$ci->db->trans_commit();
		}
		return self::$ci->db->trans_status();

	}

}
