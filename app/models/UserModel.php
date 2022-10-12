<?php


class UserModel extends NP_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTableName("user");
		$this->load->model('SaleProductModel');

	}

	public function details($userID)
	{
		$data = $this->findById($userID);


		if ($data) {
			$data["role"] = $this->getRole($data["fkRole"]);
		}
		return $data;
	}

	public function list()
	{
		$response = [];
		$users = $this->all();
		foreach ($users as $user) {
			$user["role"] = $this->RoleModel->findById($user["fkRole"]);

			$response[] = $user;
		}

		return $response;
	}

	public function findUserByEmail(string $email)
	{

		//		$result = $user;
//		$result["role"] = $this->getRole($user["fkRole"]);

		return $this->db
			->select("*")
			->from("user")
			->where(["email" => $email])
			->get()
			->row_array();


	}

	public function getRole($roleId)
	{
		$find = $this->db
			->select("*")
			->from("role")
			->where(["roleId" => $roleId])
			->get()
			->row_array();

		return $find;
	}

	public function getPermissionsByRoleId($roleId)
	{
//		$find = $this->db
//			->select("*")
//			->from("permission")
//			->join("rolePermission","rolePermission.fkRole = ")
	}

	public function getMonthlyGoalStats($userID)
	{
		$user = $this->first($userID);

		if (!$user)
			return ['success' => false];


		$monthlyGoal = $user['monthlyGoal'];
		$thisMonth = $this->SaleProductModel->getTotalKilogramProductsOfThisMonth($userID);

		return [
			'monthlyGoal' => $monthlyGoal,
			'current' => $thisMonth
		];

	}

}
