<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->setViewFolder(self::class);
		$this->load->model("AnnouncementModel");
		$this->load->model("SaleModel");
		$this->load->model("MissionModel");
		$this->load->model("CalendarEventModel");
	}

	public function index()
	{

		$statistics = [];
		if (isCan('admin')) {
			$statistics['waitingMissions'] = $this->MissionModel->count(['fkMissionStatus' => 1]);
			$statistics['ongoingSales'] = $this->SaleModel->count(['fkStatus <' => 4]);
		} else {
			$statistics['waitingMissions'] = $this->MissionModel->count(['fkMissionStatus' => 1, 'fkUser' => Auth::get('userId')]);
			$statistics['ongoingSales'] = $this->SaleModel->count(['fkStatus <' => 4, 'fkUser' => Auth::get('userId')]);

		}


		$statistics['countCustomers'] = $this->CustomerModel->count();
		$statistics['todayEvents'] = $this->CalendarEventModel->count(['fkUser' => Auth::get('userId'), 'startDate >=' => date('Y-m-d') . ' 00:00:00', 'startDate <=' => date('Y-m-d') . ' 23:59:59']);


		$this->load->library("NPMailer");

//		$this->npmailer->send('ahmetcakmakyt@gmail.com', 'Konu', generateEmailBody(Auth::get(),'Sisteme giriş yap artık.'));

		$this->setBreadcrumb(["Genel Bakış", "Ana Sayfa"]);
		$this->setSubViewFolder("main");


		$customers = $this->CustomerModel->all([], 'customerId ASC');


		$data = [
			"announcements" => $this->AnnouncementModel->getLast(15),
			"hasAnyUnreadAnnouncement" => $this->AnnouncementModel->hasAnyUnread(),
			'statistics' => $statistics,
			'customers' => $customers
		];


		$this->render($data);
	}

}
