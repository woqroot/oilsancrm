<?php

class Template
{
	public function __construct()
	{

	}

	public function index()
	{
		
		Auth::addSidebar([
			[
				"heading" => "Genel Bakış",
				"sequence" => 0
			]
		]);
		Auth::addSidebar([
			[
				"title" => "Ana Sayfa",
				"link" => base_url(),
				"sequence" => 1,
				"icon" => "bi bi-grid fs-3",
				"childrens" => [],
			]
		]);
		Auth::addSidebar([
			[
				"heading" => "Yönetim",
				"sequence" => 10,
			]
		]);
		Auth::addSidebar([
			[

				"title" => "Ekip Yönetimi",
				"link" => "#",
				"sequence" => 10,
				"icon" => "bi bi-person-workspace fs-3",
				"childrens" => [
					[
						"title" => "Kullanıcılar",
						"link" => base_url("users"),
						"childrens" => [

						]
					],
					[
						"title" => "Rol Yönetimi",
						"link" => base_url("roles"),
						"icon" => "bi bi-grid fs-3",
						"childrens" => [

						]
					]
				],
			]
		]);
		Auth::addSidebar([
			[
				"heading" => "Satış",
				"sequence" => 3
			],
			[
				"title" => "Müşteri Yönetimi",
				"link" => "#",
				"sequence" => 3,
				"icon" => "bi bi-person fs-3",
				"childrens" => [
					[
						"title" => "Yeni Müşteri",
						"link" => base_url("yeni-musteri"),
						"icon" => "bi bi-grid fs-3",
						"childrens" => [

						],
						"permissions" => [
							"required" => ["a"]
						]
					]
				],
			]
		]);


	}
}
