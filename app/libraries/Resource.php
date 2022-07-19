<?php

class Resource
{

	public static function customer(array $array)
	{
		$return = [];
		if($array["type"] == "INDIVIDUAL"){
			$return["name"] = $array["companyName"];
		}else{
			$return["name"] = $array["fullName"];
		}

		return $return;
	}

}
