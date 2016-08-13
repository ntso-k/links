<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('board_model');
		$this->load->model('bookmark_model');
	}

	public function index($board_id = 0)
	{
		$boards = $this->board_model->get_boards_by_user_id($this->user_model->get_user_id());
		if (empty($board_id) && count($boards)) {
			$board_id = $boards[0]->id;
		}
		$links = $this->bookmark_model->get_bookmarks_by_board_id($board_id);

		$this->load->view('home', array('board_id'=>$board_id, 'boards'=>$boards, 'links'=>$links));
	}
}
