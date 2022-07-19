<?php

class Test extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("PermissionModel");
		$this->load->model("RoleModel");
		$this->load->model("RolePermissionModel");
	}

	public function deneme()
	{

		Logger::Sale(1);
		exit;
		$array = [
			"Kullanıcı İşlemleri" => [
				"Kullanıcı Oluştur" 			=> "add-user",
				"Kullanıcı Düzenle" 			=> "edit-user",
				"Kullanıcı Sil" 				=> "delete-user",
				"Kullanıcı Listesi" 			=> "view-user",
			],
			"Rol İşlemleri" => [
				"Rol Oluştur" 			=> "add-role",
				"Rol Düzenle" 			=> "edit-role",
				"Rol Sil" 				=> "delete-role",
				"Rol Listesi" 			=> "view-role",
			],
			"Müşteri İşlemleri" => [
				"Müşteri Oluştur" 			=> "add-customer",
				"Müşteri Düzenle" 			=> "edit-customer",
				"Müşteri Sil" 				=> "delete-customer",
				"Müşteri Listesi" 			=> "view-customer",
				"Müşteri Grupları" 			=> "manage-customer-groups",
			],
			"Kasa & Bankalar" => [
				"Yeni Oluştur" 			=> "add-account",
				"Düzenle" 				=> "edit-account",
				"Sil/Arşivle" 			=> "delete-account",
				"Listele" 				=> "view-account",
				"Hesap Hareketleri" 	=> "view-account-activity",
			]
		];

		foreach ($array as $key => $item) {
			$data = [
				"title" => $key,
				"slug" => "",
				"seq" => 5
			];

			$insert = $this->PermissionModel->insert($data);
			if ($insert) {


				$i = 0;
				foreach ($item as $keyTo => $val) {
					$i++;
					$data = [
						"seq" => $i,
						"title" => $keyTo,
						"slug" => $val,
						"parentId" => $insert["permissionId"]
					];

					$ins = $this->PermissionModel->insert($data);
				}
			}
		}



	}

	public function adminRoles()
	{
		$this->db->query("DELETE FROM rolePermission WHERE fkRole = '1'");

		$getPermissions = $this->PermissionModel->all();
		foreach ($getPermissions as $getPermission) {
			if ($getPermission["parentId"] > 0) {
//				print_r($getPermission);

				$data = [
					"fkRole" => 1,
					"fkPermission" => $getPermission["permissionId"]
				];

				$this->RolePermissionModel->insert($data);
			}
		}
		echo "Success!";
	}
}
