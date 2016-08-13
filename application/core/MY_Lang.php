<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Lang extends CI_Lang {

	public function __construct()
	{
		parent::__construct();
	}

	public function line($line, $log_errors = FALSE)
	{
		$value = isset($this->language[$line]) ? $this->language[$line] : FALSE;

		// Because killer robots like unicorns!
		if ($value === FALSE && $log_errors === TRUE)
		{
			log_message('debugs', 'Could not find the language line "'.$line.'"');
		}

		if ($value === FALSE) {
			$value = $line;
		}

		return $value;
	}
}