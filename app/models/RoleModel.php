<?php


class RoleModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("role");
		$this->load->model("PermissionModel");

	}

	public function allWithPermissions()
	{

		$result = [];

		$roles = $this->all([], $this->primaryKey . " ASC");
		foreach ($roles as $role) {
			$getPermissions = $this->db->query("SELECT p.* FROM permission AS p 
    		INNER JOIN rolePermission AS rp ON rp.fkPermission = p.permissionId WHERE rp.fkRole = {$role["roleId"]}");

			$role["permissions"]["all"] = $getPermissions->result_array();

			$role["permissions"]["preview"] = array_slice($role["permissions"]["all"], -5);

			$result[] = $role;
		}


		return $result;

	}

	public function findWithPermissions(int $roleID)
	{
		$role = $this->findById($roleID);
		if (!$role) return false;
		$getPermissions = $this->db->query("SELECT p.* FROM permission AS p 
    		INNER JOIN rolePermission AS rp ON rp.fkPermission = p.permissionId WHERE rp.fkRole = {$roleID}");

		$role["permissions"]["all"] = $getPermissions->result_array();
		$role["permissions"]["preview"] = array_slice($role["permissions"]["all"], -5);

		return $role;

	}


}
