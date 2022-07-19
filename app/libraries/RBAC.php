<?php


class RBAC
{
	protected $CI;


	public function __construct()
	{

		$this->CI =& get_instance();

	}

	public function getSidebar()
	{

	}

	public function isCan($permission)
	{
		return true;
	}

	public static function addPermission()
	{

	}

	public function run()
	{

	}

}
