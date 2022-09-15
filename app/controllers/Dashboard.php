<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->setViewFolder(self::class);
		$this->load->model("AnnouncementModel");
	}

	public function index()
	{


		$this->load->library("NPMailer");

//		$this->npmailer->send('ahmetcakmakyt@gmail.com', 'Konu', generateEmailBody(Auth::get(),'Sisteme giriş yap artık.'));

		$this->setBreadcrumb(["Genel Bakış", "Ana Sayfa"]);
		$this->setSubViewFolder("main");

		$data = [
				"announcements" => $this->AnnouncementModel->getLast(15),
				"hasAnyUnreadAnnouncement" => $this->AnnouncementModel->hasAnyUnread(),
		];
		$this->render($data);
	}

}
