<?php

class CalendarEventModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("calendarEvent");
	}

	public function findByDateRange($startDate, $endDate)
	{

		return $this->db->query("SELECT * FROM {$this->tableName} WHERE startDate >= '{$startDate}' AND endDate <= '{$endDate}'")->result_array();

	}
}
