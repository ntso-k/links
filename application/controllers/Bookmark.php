<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends Front_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('board_model');
		$this->load->model('link_model');
		$this->load->model('bookmark_model');
	}

	public function addByUrl()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('url', 'URL', 'trim|required|valid_url');
		$this->form_validation->set_rules('board_id', 'board_id', 'required|integer');

//		if ($this->form_validation->run()) {
			$url = $this->input->post_get('url');
			$board_id = $this->input->post_get('board_id');

			$link = $this->link_model->get_link_by_url($url);

			if (is_null($link)) {
				$url_info = get_url_info($url);

				$data['url'] = $url;
				$data['title'] = $url_info['title'];
				$data['icon_url'] = $url_info['icon'];
				$data['user_id'] = $this->user_model->get_user_id();

				$link = $this->link_model->create($data);
			}

			$bookmark = $this->bookmark_model->get_bookmark_by_board_link($board_id, $link->id);

			if (!is_null($link) && is_null($bookmark)) {
				$bookmark['link_id'] = $link->id;
				$bookmark['board_id'] = $board_id;
				$bookmark['user_id'] = $this->user_model->get_user_id();

				if (!is_null($bookmark_id = $this->bookmark_model->create($bookmark))) {
					echo json_encode(array('status' => 'success'));
					exit;
				}
			}
//		}



		echo json_encode(array('status' => 'fail'));
	}

	public function test()
	{
		$r = $this->bookmark_model->exist_bookmark(1, 8);
		var_dump($r);
	}

	public  function get_url_info($url = "http://www.mi.com/soo/eee?id=11")
	{
		var_dump(parse_url($url));
		var_dump(get_url_info($url));
	}
}
