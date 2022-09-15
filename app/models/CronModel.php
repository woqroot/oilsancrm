<?php

class CronModel extends NP_Model
{

	static $softDeleteText = "deletedAt IS NULL";

	public function __construct()
	{
		parent::__construct();
	}

	public function trialProductReminder()
	{
		return $this->db->query("SELECT * FROM trialProduct WHERE ".self::$softDeleteText." AND tpStatus = '0' AND endDate = CURDATE()")->result_array();

	}
}
