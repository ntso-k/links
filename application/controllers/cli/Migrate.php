<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{

	public function index()
	{
//		if ($this->input->is_cli_request())
//		{
			$this->load->library('migration');

			if ($this->migration->version(104) === FALSE)
			{
				show_error($this->migration->error_string());
			}
//		}
	}

}