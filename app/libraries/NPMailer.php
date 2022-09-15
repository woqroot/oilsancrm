<?php

class NPMailer
{

	protected $ci;
	protected $config;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library("email");
		$this->initialize();
	}

	private function initialize()
	{
		$this->config['protocol'] = 'smtp';
		$this->config['smtp_host'] = "mail.ahmetcakmak.net.tr";
		$this->config['smtp_user'] = "test@ahmetcakmak.net.tr";
		$this->config['smtp_pass'] = "}.l*qqUFC72b";
		$this->config['smtp_port'] = 587;
		$this->config['mailtype'] = 'html';

		$this->ci->email->initialize($this->config);
	}

	public function send($to, $subject, $message)
	{

		$this->ci->email->from($this->config['smtp_user'], 'OilsanCRM');
		$this->ci->email->to($to);
		$this->ci->email->subject($subject);
		$this->ci->email->message($message);

		return $this->ci->email->send();



	}
}
