<?php


class Auth
{

	private static $instance;
	private static $user;
	private static $role;
	private static $permissions;
	private static $sidebar = [];

	public function __construct()
	{

		if (isLogin()) {

			self::$instance =& get_instance();
			self::$instance->load->model("UserModel");
			self::$instance->load->model("RoleModel");
			self::$instance->load->model("PermissionModel");


			self::$user = self::$instance->UserModel->findById($_SESSION["user"]["userId"]);
			self::$user["image"] = $this->getAvatar();
			self::$permissions = self::$instance->PermissionModel->getSlugsByRoleId(self::get("fkRole"));
			self::$role = self::$instance->RoleModel->findById(self::get("fkRole"));

			self::$instance->UserModel->update(["lastSeenAt" => date("Y-m-d H:i:s")], self::$user["userId"]);


		}

	}

	protected function getAvatar()
	{

		if (is_file(uploads_dir(self::$user["image"]))) {
			return '<img alt="Logo" class="rounded-circle" style="max-width:100%" src="' . uploads_url(self::$user["image"]) . '">';
		}
		return '<div class="symbol-label fs-3  bg-light-primary text-primary">' . mb_substr(self::$user["firstName"], 0, 1, 'UTF-8') . mb_substr(self::$user["lastName"], 0, 1, 'UTF-8') . '</div>';

	}

	public static function update($values)
	{
		return self::$instance->UserModel->update($values, ['userId' => self::$user['userId']]);
	}

	public static function get($column = null)
	{
		if ($column) {
			return self::$user[$column] ?? null;
		}
		return self::$user;
	}

	public static function getSidebar()
	{

		$keys = array_column(self::$sidebar, 'sequence');
		array_multisort($keys, SORT_ASC, self::$sidebar);
		return self::$sidebar;
	}

	public static function addSidebar(array $array)
	{
		if (isset($options["title"])) {
			self::$sidebar[] = $array;
		} else {
			foreach ($array as $item) {
				if (!isset($item["sequence"])) {
					$item["sequence"] = 9999;
				}
				self::$sidebar[] = $item;
			}
		}
	}

	public static function isCan(...$slugs)
	{
		foreach ($slugs as $slug) {
			if (!in_array($slug, self::$permissions)) {
				return false;
			}
		}
		return true;
	}

	public static function isCanOr(...$slugs)
	{

		foreach ($slugs as $slug) {
			if (self::isCan($slug)) {
				return true;
				break;
			}
		}
		return false;
	}

	public static function checkPerms(...$slugs)
	{
		if (!self::isCan(...$slugs)) exit;
	}

	public static function checkPermsOr(...$slugs)
	{
		if (!self::isCanOr(...$slugs)) exit;
	}

}
