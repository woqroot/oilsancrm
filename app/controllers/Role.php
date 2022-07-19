<?php

class Role extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("RoleModel", "model");
		$this->load->model("RolePermissionModel");
		$this->load->model("PermissionModel");
	}

	public function list()
	{

		$data = [
			"roles" => $this->RoleModel->allWithPermissions(),
			"permissions" => $this->PermissionModel->allWithGroups()
		];

		$this->setBreadcrumb(["Ekip Yönetimi", "Rol Yönetimi"]);
		$this->render($data);
	}

	public function details($id)
	{

		$role = $this->model->findWithPermissions($id);

		if (!$role) redirect();

		$data = [
			"role" => $role,
			"users" => $this->UserModel->all(["fkRole" => $id]),
			"permissions" => $this->PermissionModel->allWithGroups()
		];

		$this->setBreadcrumb(["Ekip Yönetimi", "Rol Yönetimi", $role["title"]]);
		$this->render($data);
	}

	public function add()
	{
		$title = $this->input->post("title");
		$permissions = is_array($this->input->post("permissions")) ? array_keys($this->input->post("permissions")) : [];

		$data = [
			"title" => $title
		];
		$success = $this->RoleModel->insert($data);
		if ($success) {
			$fkRole = $success["roleId"];
			foreach ($permissions as $permissionID) {

				$data = [
					"fkRole" => $fkRole,
					"fkPermission" => $permissionID
				];

				$this->RolePermissionModel->insert($data);
			}
			return $this->toJson(["status" => 1]);
		}
		return $this->toJson(["status" => 0]);
	}

	public function find()
	{
		$id = $this->input->post("id");

		$find = $this->RoleModel->findWithPermissions($id);
		return $this->toJson($find);

	}

	public function update()
	{
		$fkRole = $this->input->post("roleId");
		$roleData = $this->RoleModel->findById($fkRole);
		if (!$roleData) return false;
		if($roleData["isEditable"] != 1) return $this->toJson(["status" => 0, "Bir hata oluştu..."]);
		$this->RolePermissionModel->clearByRoleId($fkRole);

		$title = $this->input->post("title");
		$permissions = is_array($this->input->post("permissions")) ? array_keys($this->input->post("permissions")) : [];

		$data = [
			"title" => $title
		];
		$success = $this->RoleModel->update($data, $fkRole);
		if ($success) {

			foreach ($permissions as $permissionID) {

				$data = [
					"fkRole" => $fkRole,
					"fkPermission" => $permissionID
				];

				$this->RolePermissionModel->insert($data);
			}
			return $this->toJson(["status" => 1]);
		}
		return $this->toJson(["status" => 0]);
	}

	public function delete()
	{
		$roleId = $this->input->post("roleId");

		$getRole = $this->RoleModel->findById($roleId);
		if (!$getRole) return $this->toJson(["status" => 0, "message" => "Bir hata oluştu."]);
		if($getRole["isEditable"] != 1) return $this->toJson(["status" => 0, "Bir hata oluştu..."]);
		$findUsers = $this->UserModel->first(["fkRole" => $roleId]);
		if ($findUsers) return $this->toJson(["status" => 0, "message" => "Sistemde bu role bağlı kullanıcılar bulunduğundan işlem gerçekleştirilemedi."]);

		$deletePermissions = $this->RolePermissionModel->delete(["fkRole" => $roleId]);
		if ($deletePermissions) {
			$deleteRole = $this->RoleModel->delete($roleId);
			if ($deleteRole) {
				return $this->toJson(["status" => 1, "message" => "Rol başarıyla silindi!"]);
			}
		}
		if (!$getRole) return $this->toJson(["status" => 0, "message" => "Bir hata oluştu."]);


	}
}
