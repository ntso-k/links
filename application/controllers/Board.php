<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends Front_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('board_model');
	}

	public function create()
	{
		$this->load->library('form_validation');

		if ('post' == $this->input->method()) {
			$this->form_validation->set_rules('title', lang('Title'), 'trim|required');
			$this->form_validation->set_rules('description', lang('Description'), 'trim');

			if ($this->form_validation->run()) {
				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['user_id'] = $this->user_model->get_user_id();

				if ($this->board_model->create($data)) {
					redirect('home');
				}
			}
		}

		$this->load->view('board/create');
	}
}
