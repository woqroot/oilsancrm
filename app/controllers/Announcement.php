<?php
class Announcement extends NP_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("AnnouncementModel");
		$this->setViewFolder(self::class);

	}

	public function list()
	{
		checkPerms("admin");

		$this->setBreadcrumb(["Duyurular", "Duyuru Yönetimi"]);
		$data = [
			"announcements" => $this->AnnouncementModel->all()
		];
		$this->render($data);
	}

	public function action()
	{



		switch ($this->input->post("action")) {
			case "ADD":
				checkPerms("admin");
				$image = "";

				$data = [
					"title" => $this->input->post("title"),
					"explanation" => $this->input->post("explanation"),
					"createdBy" => $this->session->user["userId"]
				];
				$result = $this->AnnouncementModel->insert($data);
				if ($result) {
					$response = [
						"status" => 1,
						"message" => "Duyuru başarıyla yayımlandı."
					];
					echo json_encode($response);
					return;
				}
				break;

			case "EDIT":

				checkPerms("admin");
				$data = [
					"title" => $this->input->post("title"),
					"explanation" => $this->input->post("explanation")
				];

				$result = $this->AnnouncementModel->update($data,post("id"));
				if ($result) {
					$response = [
						"status" => 1,
						"message" => "Değişiklikler başarıyla kaydedildi."
					];
					echo json_encode($response);
					return;
				}
				break;

			case "DELETE":
				checkPerms("admin");
				$result = $this->AnnouncementModel->delete($this->input->post("id"));
				if ($result) {
					$response = [
						"status" => 1,
						"message" => "Kayıt başarıyla silindi."
					];
					echo json_encode($response);
					return;
				}
				break;

			case "FIND":
				$result = $this->AnnouncementModel->first($this->input->post("id"));
				echo json_encode($result);
				return;
				break;
			default:
				$result = false;
				break;
		}


	}

	public function view()
	{
		$this->load->model("UserModel");

		$id = post("announcementId");

		$data = $this->AnnouncementModel->view($id);
		$createdBy = $this->UserModel->findById($data["createdBy"]);
		echo json_encode([
			"title" => $data["title"],
			"explanation" => $data["explanation"],
			"image" => getAvatar($createdBy["image"]),
			"name" => $createdBy["firstName"] . " " . $createdBy["lastName"],
			"email" => $createdBy["email"],
			"createdAt" => date("d-m-Y", strtotime($data["createdAt"])),
		]);


	}

}
