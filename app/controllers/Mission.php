<?php

class Mission extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("MissionModel");
		$this->load->model("MissionStatusModel");
		$this->load->model("DocumentModel");
		$this->load->model("UserModel");
	}

	public function list()
	{

		$this->setBreadcrumb("Talepler");
		$data = [];
		$data["statuses"] = $this->MissionStatusModel->all([], "missionStatusId ASC");
		$data["countries"] = $this->CountryModel->all([], "countryId ASC");
		$data["users"] = $this->UserModel->all([], "firstName ASC, lastName ASC");

		$this->render($data);
	}

	public function listOrdered()
	{
		$this->setBreadcrumb("Talepler - Sıralı Liste");
		$data = [];
		$data["statuses"] = $this->MissionStatusModel->all([], "missionStatusId ASC");
		$data["users"] = $this->UserModel->all([], "firstName ASC, lastName ASC");
		$data["countries"] = $this->CountryModel->all([], "countryId ASC");

		$this->render($data);
	}

	public function add()
	{
		$this->setBreadcrumb(["Görevler", "Yeni Oluştur"]);
		$last = $this->MissionModel->last();
		$data = [];
		$data["statuses"] = $this->MissionStatusModel->all([], "missionStatusId ASC");
		$data["users"] = $this->UserModel->all([], "firstName ASC, lastName ASC");
		$data["missionID"] = $last ? $last["missionId"] + 1 : 1;

		$this->render($data);
	}

	public function edit($id)
	{

		$mission = $this->MissionModel->first($id);
		if (!$mission) redirect(base_url("missions"));
		if (!isCan("admin") && $mission["fkUser"] != Auth::get('userId')) {
			redirect(base_url("missions"));
			exit;
		}
		$this->setBreadcrumb(["Görevler", $mission["title"]]);
		$data = [];
		$data["statuses"] = $this->MissionStatusModel->all([], "missionStatusId ASC");
		$data["users"] = $this->UserModel->all([], "firstName ASC, lastName ASC");
		$data["mission"] = $mission;
		$data["currentStatus"] = $this->MissionStatusModel->first($mission["fkMissionStatus"]);

		$this->render($data);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":
				checkPerms("admin");
				$data = [
					'title' => post('title'),
					'explanation' => post('explanation'),
					'fkMissionStatus' => 1,
					'fkUser' => post('fkUser'),
					'startDate' => convertDate(post('startDate')),
					'endDate' => convertDate(post('endDate')),
				];

				$insert = $this->MissionModel->insert($data);
				if ($insert) {
					$user = $this->UserModel->first(post('fkUser'));


					return $this->response(1, "Görev başarıyla oluşturuldu.", ['data' => $insert]);
				}

				return $this->response();
				break;

			case "EDIT":

				$id = post("missionID");
				$mission = $this->MissionModel->first($id);

				if (!$mission)
					forbidden();


				if (!isCan("admin") && $mission["fkUser"] != Auth::get("userId")) {
					forbidden();
					exit;
				}

				$data = [];

				if (isCan("admin") ) {
					$data = [
						'title' => post('title'),
						'explanation' => post('explanation'),
						'fkUser' => post('fkUser'),
						'startDate' => convertDate(post('startDate')),
						'endDate' => convertDate(post('endDate'))
					];
				}

				if(post("type")){
					$data["fkMissionStatus"] = post("type") == "possitive" ? 2 : 1;
				}else{
					$data["fkMissionStatus"] = post("fkStatus");
				}
				$data["approveMessage"] = post("approveMessage");


				$success = $this->MissionModel->update($data, $mission["missionId"]);
				if ($success) {
					return $this->response(1, "Değişiklikler başarıyla kaydedildi.");
				}

				return $this->response();
				break;

			case "DELETE":
				checkPerms("admin");
				$id = post('id');
				if ($this->MissionModel->delete($id)) {
					return $this->response(1, "Talep başarıyla silindi.");
				}

				return $this->response();
				break;

		}
	}

	public function ajax()
	{

		$searchableColumns = [
			"m.missionId",
			"m.title",
			"m.startDate",
			"m.endDate",
			"CONCAT(u.firstName,' ',u.lastName)",
			"s.name",
			"m.missionId"
		];

		$searchVal = $this->input->post("search")["value"];

		$whereSearch = "WHERE m.deletedAt IS NULL";

		if (!isCan("admin")) {
			$whereSearch .= " AND m.fkUser = '" . Auth::get('userId') . "' ";
		}

		$filterStatusID = $this->input->post("statusID");
		if ($filterStatusID > 0) {
			$whereSearch .= " AND m.fkMissionStatus = '$filterStatusID'";
		}

		$filterUserID = $this->input->post("userID");
		if ($filterUserID > 0 && isCan("admin")) {
			$whereSearch .= " AND m.fkUser = '$filterUserID'";
		}


		$dateBetween = post("dateBetween");
		if ($dateBetween) {
			$string = explode(' - ', $dateBetween);

			$date1 = explode('/', $string[0]);
			$date2 = explode('/', $string[1]);

			$finalDate1 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
			$finalDate2 = $date2[2] . '-' . $date2[1] . '-' . $date2[0];

			$whereSearch .= " AND m.startDate >= '$finalDate1' AND m.startDate <= '$finalDate2'";


		}
		if ($searchVal) {

			$whereSearch .= " AND (";

			foreach ($searchableColumns as $key => $searchableColumn) {

				$whereSearch .= "$searchableColumn LIKE '%{$searchVal}%'";
				if (array_key_last($searchableColumns) != $key) {
					$whereSearch .= " OR ";
				} else {
					$whereSearch .= ")";
				}
			}
		}

		if (isset($this->input->post("order")[0]["column"]) and isset($this->input->post("order")[0]["dir"])) {
			$orderBy = "ORDER BY " . $searchableColumns[$this->input->post("order")[0]["column"]] . " " . $this->input->post("order")[0]["dir"];
		} else {
			$orderBy = "ORDER BY s.name ASC, m.missionId DESC";
		}


		$start = $this->input->post("start") ?? 0;
		$length = $this->input->post("length") == -1 ? 10 : $this->input->post("length");

		$limit = "LIMIT {$start}, {$length}";

		$list = $this->MissionModel->list($whereSearch, $orderBy, $limit);
		$data = [];

		$countTotalRecords = $this->MissionModel->countRecords($whereSearch, $orderBy, $limit);
		$countFilteredRecords = $this->MissionModel->countRecords($whereSearch, $orderBy);

		foreach ($list as $item) {

			$deleteText = "";

			if (isCan("admin")) {
				$deleteText = '<a href="javascript:void(0)" class="deleteMission" data-id="' . $item["missionId"] . '"><button class="btn btn-sm btn-light-danger">Sil</button></a>';
			}

			if (isCan("admin")) {
				$data[] = [
					$item["missionId"],
					$item["title"],
					convertDate($item["startDate"]) ? convertDate($item["startDate"]) : "-",
					convertDate($item["endDate"]) ? convertDate($item["endDate"]) : "-",
					'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="#"
									   class="text-gray-600 text-hover-primary mb-1">' . $item["userFirstName"] . ' ' . $item["userLastName"] . '</a>
									<span class="text-gray-500">' . $item["userEmail"] . '</span>
								</div></div>',
					'<span class="badge badge-' . $item["statusClassName"] . '">' . $item["statusName"] . '</span>',
					'<a href="' . base_url("missions/" . $item["missionId"]) . '"><button class="btn btn-sm btn-light-primary">Görüntüle</button></a> ' . $deleteText,
				];
			} else {
				$data[] = [
					$item["missionId"],
					$item["title"],
					convertDate($item["startDate"]) ? convertDate($item["startDate"]) : "-",
					convertDate($item["endDate"]) ? convertDate($item["endDate"]) : "-",
					'<div class="d-flex align-items-center">
								<div class="d-flex flex-column">
									<a href="#"
									   class="text-gray-600 text-hover-primary mb-1">' . $item["userFirstName"] . ' ' . $item["userLastName"] . '</a>
									<span class="text-gray-500">' . $item["userEmail"] . '</span>
								</div></div>',
					'<span class="badge badge-' . $item["statusClassName"] . '">' . $item["statusName"] . '</span>',
					'<a href="' . base_url("missions/" . $item["missionId"]) . '"><button class="btn btn-sm btn-light-primary">Görüntüle</button></a> ' . $deleteText,
				];
			}
		}

		$response = array(
			'draw' => intval($this->input->post("draw")),
			'recordsTotal' => $countTotalRecords,
			'recordsFiltered' => $countFilteredRecords,
			'data' => $data


		);
		echo json_encode($response);

	}

}
