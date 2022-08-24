<?php

class AnnouncementModel extends NP_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->setTableName("announcement");
	}

	public function getLast($limit)
	{
		$all = $this->db->query("SELECT a.*,u.firstName,u.lastName,u.image FROM announcement AS a INNER JOIN user AS u ON u.userId = a.createdBy WHERE a.deletedAt IS NULL ORDER BY a.announcementId DESC LIMIT {$limit}")->result_array();
		$result = [];
		foreach ($all as $item) {
			if (in_array($_SESSION["user"]["userId"], json_decode($item["viewers"], true))) {
				$item["isViewed"] = 1;
			} else {
				$item["isViewed"] = 0;
			}
			$result[] = $item;
		}

		return $result;
	}

	public function view($announcementId)
	{
		$data = $this->first($announcementId);

		$viewers = json_decode($data["viewers"], true);

		if (!in_array($this->session->user["userId"], $viewers)) {
			$viewers[] = $this->session->user["userId"];
			$updateData = [
				"viewers" => json_encode($viewers)
			];

			$this->update($updateData, $data["announcementId"]);
		}

		return $data;
	}

	public function hasAnyUnread()
	{
		$query = $this->db->query("SELECT * FROM announcement WHERE announcementId NOT IN (SELECT announcementId FROM `announcement` WHERE JSON_CONTAINS(viewers, '\"{$this->session->user["userId"]}\"') AND deletedAt IS NULL) AND deletedAt IS NULL")->row_array();

		if ($query) return true;

		return false;
	}

}
