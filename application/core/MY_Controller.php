<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('session'));
		$this->load->helper(array('url', 'language'));
	}
}

class Front_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
}

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */