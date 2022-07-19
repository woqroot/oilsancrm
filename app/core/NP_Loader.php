<?php


class NP_Loader extends CI_Loader
{
	public function __construct()
	{
		parent::__construct();
		$this->_ci_view_paths = array(
			APPPATH . 'views/'.THEME.'/' => TRUE
		);
	}
}
