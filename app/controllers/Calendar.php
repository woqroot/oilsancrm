<?php

class Calendar extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("CalendarEventModel");
		$this->load->model("EventCategoryModel");
	}

	public function redirect()
	{
		redirect(base_url('calendar/' . Auth::get('userId')));
	}

	public function index($userID)
	{
		if (!isCan('admin') && $userID != Auth::get('userId'))
			$this->redirect();


		$user = $this->UserModel->first($userID);
		if (!$user)
			$this->redirect();

		$this->setBreadcrumb(['Takvim - ' . $user['firstName'] . ' ' . $user['lastName']]);
		$data = [
			'eventCategories' => $this->EventCategoryModel->all(),
			'user' => $user,
			'users' => $this->UserModel->all()
		];
		$this->render($data);
	}

	public function getEvents()
	{

		$start = clearDateTime($_GET["start"]);
		$end = convertDateTime($_GET["end"]);
		$userID = $_GET['userID'];

		if (!isCan('admin') && $userID != Auth::get('userId'))
			$this->redirect();

		$events = $this->CalendarEventModel->findByDateRange($userID,$start, $end);

		$result = [];

		foreach ($events as $event) {

			$allDay = false;

			$startTime = date("H:i", strtotime($event["startDate"]));
			$endTime = date("H:i", strtotime($event["endDate"]));

			if ($startTime == '00:00' && $endTime == '00:00') {
				$allDay = true;
			}

			$className = 'border-0 ';
			$category = $this->EventCategoryModel->first($event['fkEventCategory']);
			if ($category)

				$className .= $category['className'];
			$result[] = [
				'id' => rand(1000000, 9999999),
				'calendarEventId' => $event['calendarEventId'],
				'title' => $event["title"],
				'explanation' => $event["explanation"],
				'start' => $event["startDate"],
				'end' => $event["endDate"],
				'className' => $className,
				'starttime' => date("H:i", strtotime($event["startDate"])),
				'endtime' => date("H:i", strtotime($event["endDate"])),
				'allDay' => $allDay,
				'fkEventCategory' => $event['fkEventCategory']
			];
		}

		//				// 	id: V(),
		//				// 	title: "All Day Event",
		//				// 	start: I + "-01",
		//				// 	end: I + "-02",
		//				// 	description: "Toto lorem ipsum dolor sit incid idunt ut",
		//				// 	className: "fc-event-danger fc-event-solid-warning",
		//				// 	location: "Federation Square"
		echo $this->toJson(
			$result
		);
	}

	public function action()
	{
		switch (post("action")) {
			case "ADD":

				if (!isCan('admin') && Auth::get('userId') != $_GET['userID'])
					return $this->response();

				$event = $_POST["event"];

				$startDate = str_replace("T", " ", $event["start"]);
				$endDate = str_replace("T", " ", $event["end"]);


				$data = [
					'title' => $event["title"],
					'explanation' => $event["explanation"],
					'startDate' => $startDate,
					'endDate' => $endDate,
					'fkEventCategory' => $event['fkEventCategory'],
					'fkUser' => $_GET['userID']
				];

				$success = $this->CalendarEventModel->insert($data);

				if ($success)
					return $this->response(1, 'Etkinlik başarıyla oluşturuldu!');

				return $this->response(0, 'Bir hata oluştu...', ['data' => $data]);

				break;

			case "EDIT":

				$event = $_POST["event"];

				$eventData = $this->CalendarEventModel->first($event['calendarEventId']);
				if (!$eventData)
					return $this->response(0, "Critical");

				$startDate = clearDateTime($event["start"]);
				$endDate = clearDateTime($event["end"]);

				$data = [
					'title' => $event['title'],
					'explanation' => $event['explanation'],
					'startDate' => $startDate,
					'endDate' => $endDate,
					'fkEventCategory' => $event['fkEventCategory']
				];

				$success = $this->CalendarEventModel->update($data, $eventData['calendarEventId']);

				if ($success) {
					return $this->response(1, "Değişiklikler başarıyla kaydedildi!");
				}
				return $this->response();
				break;

		}
	}
}
