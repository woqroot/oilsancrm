<?php


class PermissionModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("permission");

	}

	public function getSlugsByRoleId(int $roleId)
	{
		$result = [];
		$query = $this->db->query("SELECT p.slug FROM rolePermission AS rp
					INNER JOIN permission AS p ON p.permissionId = rp.fkPermission WHERE rp.fkRole = '{$roleId}'");

		$all = $query->result_array();
		foreach ($all as $item) {
			$result[] = $item["slug"];
		}
		return $result;
	}

	public function allWithGroups()
	{
		$result = [];
		$headings = $this->db->query("SELECT * FROM permission WHERE parentId IS NULL ORDER BY seq ASC")->result_array();
		foreach ($headings as $heading) {
			$heading["permissions"] = $this->db->order_by("seq","ASC")->get_where($this->tableName,["parentId" => $heading["permissionId"]])->result_array();
			$result[] = $heading;
		}
		return $result;
	}
}
