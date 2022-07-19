<?php


class RolePermissionModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("rolePermission");
	}

	public function clearByRoleId($roleId)
	{
		return $this->db->query("DELETE FROM ".$this->tableName." WHERE fkRole = '{$roleId}'");
	}
}
