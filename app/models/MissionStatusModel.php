<?php

class MissionStatusModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("missionStatus");
	}
}
