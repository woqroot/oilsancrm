<?php

class User extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("UserModel");
		$this->load->model("TestModel");

	}

	public function changeTheme()
	{
		$themes = ['light', 'dark'];
		$theme = $this->input->post("theme");
		if (!in_array($theme, $themes)) $theme = $themes[0];
		$result = Auth::update(["theme" => $theme]);
		if ($result) {
			return $this->toJson(["status" => 1]);
		}

	}

	public function login()
	{


		if (isLogin()) redirect(base_url());
//		$session = [
//			"userLogin" => true,
//			"user" => [
//				"userId" => 1
//			]
//		];

//		$this->session->set_userdata($session);
		$this->render();
	}

	public function loginPost()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$findUser = $this->UserModel->findUserByEmail($email);
		if ($findUser) {
			if ($findUser["password"] == $password) {
//				$role = $this->UserModel->getRole($findUser["fkRole"]) OR die($this->toJson(["status" => 3]));
				// TODO:: Convert to Password_verify

				$session = [
					"userLogin" => true,
					"user" => [
						"userId" => $findUser["userId"]
					]
				];

				$this->session->set_userdata($session);

				return $this->response(1, "Başarıyla giriş yapıldı, yönlendiriliyorsunuz...");
			}
		}
		return $this->response(0,"Bilgileriniz hatalı, lütfen tekrar deneyin.");

	}

	public function signOut()
	{
		session_destroy();
		redirect("auth/login");
	}

	public function roles()
	{

		$this->setBreadcrumb("");
		$this->render("index");
	}

	public function list()
	{
		$this->setBreadcrumb(["Ekip Yönetimi", "Kullanıcı Yönetimi"]);

		$data = [
			"users" => $this->UserModel->list(),
			"roles" => $this->RoleModel->allWithPermissions()
		];

		$this->render($data);
	}

	public function add()
	{

		$requiredFields = ["firstName", "lastName", "email", "roleID", "password", "rePassword"];
		foreach ($requiredFields as $requiredField) {
			if (!$this->input->post($requiredField)) {
				return $this->response(0, "Yıldız (*) ile belirtilen alanları doldurarak tekrar deneyin.");
			}
		}
		extract($this->input->post());

		if ($password != $rePassword) {
			return $this->response(0, "Girdiğiniz parolalar eşleşmiyor. Lütfen tekrar deneyin.");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return $this->response(0, "Geçerli bir e-posta adresi girmelisiniz:");
		}
		$role = $this->RoleModel->findById((int)$roleID);
		if (!$role) $this->response(0, "Kullanıcı için bir rol seçimi yapmalısınız");

		if (strlen($phone) > 6) {
			$phone = phoneMask($phone);
		} else {
			$phone = NULL;
		}

		$data = [
			"firstName" => $firstName,
			"lastName" => $lastName,
			"email" => $email,
			"phone" => $phone,
			"password" => passwordEncrypt($password),
			"theme" => "light",
			"fkRole" => $roleID
		];

		if ($_FILES["image"]["tmp_name"]) {
			$image = upload_file("image", "user", "png|jpg|jpeg");
			if ($image) {
				$data["image"] = $image;
			}
		}

		$success = $this->UserModel->insert($data);
		if ($success) {
			return $this->response(1, "Kullanıcı başarıyla oluşturuldu!");
		}

	}

	public function details($userID)
	{
		$user = $this->UserModel->details($userID);
		if (!$user) {
			redirect("users");
		}
		$this->setBreadcrumb($user["firstName"] . " " . $user["lastName"]);

		$data = [
			"user" => $user
		];

		$this->render($data);

	}

}
