<?php

class User extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("UserModel");
		$this->load->model("TestModel");
		$this->load->model("DocumentModel");
		$this->load->model("SaleModel");

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
			if (password_verify($password,$findUser["password"])) {
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
		return $this->response(0, "Bilgileriniz hatalı, lütfen tekrar deneyin.");

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

	public function action()
	{
		checkPerms('admin');
		switch (post('action')) {
			case "EDIT":

				$user = $this->UserModel->first(post('userID'));
				if (!$user)
					return $this->response();

				$data = [
					'firstName' => post('firstName'),
					'lastName' => post('lastName'),
					'birthDate' => convertDate(post('birthDate'))
				];

				if ($user['email'] != post('email')) {
					$findDuplicate = $this->UserModel->first(['email' => post('email')]);
					if ($findDuplicate) {
						return $this->response(0, 'Bu e-posta adresi ile kayıtlı başka bir kullanıcı mevcut.');
					}

					$data['email'] = post('email');
				}

				if ($user['phone'] != phoneMask(post('phone'))) {
					$findDuplicate = $this->UserModel->first(['phone' => phoneMask(post('phone'))]);
					if ($findDuplicate) {
						return $this->response(0, 'Bu telefon numarası ile kayıtlı başka bir kullanıcı mevcut.');
					}

					$data["phone"] = phoneMask(post('phone'));
				}

				if(post('password') && strlen(post('password')) >= 8){
					$data["password"] = passwordEncrypt(post('password'));
				}

				$success = $this->UserModel->update($data, $user['userId']);

				if ($success)
					return $this->response(1, "Değişiklikler başarıyla kaydedildi.");

				return $this->response();
				break;
		}
	}

	public function details($userID)
	{
		$user = $this->UserModel->details($userID);
		if (!$user) {
			redirect("users");
		}
		$this->setBreadcrumb($user["firstName"] . " " . $user["lastName"]);
		$goalStats = $this->UserModel->getMonthlyGoalStats(Auth::get('userId'), defaultCurrency());

		if ($goalStats["monthlyGoal"] > 0) {
			$percent = floor($goalStats['current']['total'] / $goalStats["monthlyGoal"] * 100);
		} else {
			$percent = 0;
		}

		$goal = [
			'title' => 'Aylık Satış Hedefi',
			'currentSales' => number_format($goalStats['current']['total'], 2) . ' ' . $goalStats['current']['currency'],
			'total' => $goalStats["monthlyGoal"] . ' ' . $goalStats['current']['currency'],
			'percent' => $percent
		];

		$data = [
			"user" => $user,
			"goal" => $goal,
			"sales" => $this->SaleModel->all(['fkUser' => $user['userId']]),
			"documents" => $this->DocumentModel->all(['fkUser' => $user['userId']])
		];

		$this->render($data);

	}

}
