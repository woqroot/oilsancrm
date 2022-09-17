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
//		print_r($trialProductReminder);
//		exit;
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

	public function updateExchangeRates()
	{
		if (!function_exists('simplexml_load_string') || !function_exists('curl_init')) {
			return 'Simplexml extension missing.';
		}

		try {
			$tcmbMirror = 'https://www.tcmb.gov.tr/kurlar/today.xml';
			$curl = curl_init($tcmbMirror);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_URL, $tcmbMirror);

			$dataFromtcmb = curl_exec($curl);
		} catch (Exception $e) {
			echo 'Unhandled exception, maybe from cURL' . $e->getMessage();
			return 0;
		}

		$Currencies = simplexml_load_string($dataFromtcmb);
//		print_r($Currencies);

		$rates = [];

		foreach ($Currencies->Currency as $Currency) {
			$rates[(string)$Currency->attributes()->CurrencyCode[0]] = (string)$Currency->BanknoteSelling;
		}
		$rates["TRY"] = 1;

		$this->load->model('ExchangeRateModel');
		$modelRates = $this->ExchangeRateModel->all();

		foreach ($modelRates as $modelRate) {
			if($rates[$modelRate['fromCurrency']] && $rates[$modelRate['toCurrency']]){
				$result = $rates[$modelRate['fromCurrency']]/$rates[$modelRate['toCurrency']];

				$update = $this->ExchangeRateModel->update(['rate' => $result],$modelRate['exchangeRateId']);

				echo $modelRate['fromCurrency'] . " to -> " . $modelRate['toCurrency'] . ' ==> ' . $result . '<br>';
			}

		}
	}

	public function checkPassiveCustomers()
	{
		$this->CustomerModel->checkPassiveCustomers();
	}

	public function checkPassiveCustomersThreeMonthAgo()
	{
		$this->CustomerModel->checkPassiveCustomers();
	}
}
