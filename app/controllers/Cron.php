<?php

class Cron extends NP_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('CustomerModel');
		$this->load->model('SaleModel');
		$this->load->model('TrialProductModel');
		$this->load->model('CronModel');
		$this->load->model('ProductModel');
		$this->load->library('NPMailer');

	}

	public function trialProducts()
	{
		$trialProductReminder = $this->CronModel->trialProductReminder();
		foreach ($trialProductReminder as $item) {
			$customer = $this->CustomerModel->first($item['fkCustomer']);
			$sale = $this->SaleModel->first($item['fkSale']);
			$user = getUser($sale['fkUser'], 'email');
			$product = $this->ProductModel->first($item['fkProduct']);
			$unit = Main::unit($item['fkUnit']);
			if (!$product)
				$product['name'] = 'Bilinmiyor';

			if (!$unit)
				$unit = '';

			if ($user) {
				$message = '
<p>Teslim alınma tarihi bugün olan 1 adet deneme ürünü bulundu. Sisteme giriş yaparak kontrol edebilirsiniz.</p>
<br><br><br><b>Müşteri Unvanı: </b>' . $customer['name'] . '<br><b>E-posta Adresi: </b>' . $customer['email'] . '<br><b>Satış No: </b>#' . $sale['invoiceNumber'] . '<br><br>
				<b>Ürün: </b>' . $item['amount'] . ' ' . $unit . " x " . $product['name'] . "<br><b>Ürünlerin Veriliş Tarihi: </b>" . localizeDate("d M Y", $item['startDate']) . "<br>
				<b>Ürünlerin Teslim Alınacağı Tarih: </b>" . localizeDate("d M Y", $item['endDate']);
				$this->npmailer->send($user['email'], 'OilsanCRM - Deneme Ürünü Hatırlatıcı', generateEmailBody($user, $message));
			}

		}

	}
}
