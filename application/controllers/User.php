<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Front_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$this->load->library('form_validation');

		if ($this->user_model->is_logged_in()) {
			redirect('home');
		} elseif ('post' == $this->input->method()) {
			$this->form_validation->set_rules('username', lang('Username'), 'required');
			$this->form_validation->set_rules('password', lang('Password'), 'required');
			$this->form_validation->set_rules('remember', lang('RemeberMe'), 'integer');

			if ($this->form_validation->run()) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$remember = $this->input->post('remember');

				if ($this->user_model->login($username, $password, $remember)) {
					redirect('home');
				} else {
					//TODO error message

				}

			}
		}

		$this->load->view('/user/login');
	}

	public function logout()
	{
		$this->user_model->logout();

		redirect('');
	}

	public function join()
	{
		$this->load->library('form_validation');

		if ('post' == $this->input->method()) {
			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			$this->form_validation->set_rules('username', lang('Username'), 'trim|required|min_length[4]|max_length[30]|alpha_dash|is_unique[user.username]',
				array(
					'required'      => 'You have not provided %s.',
					'is_unique'     => 'This %s already exists.'
				)
			);
			$this->form_validation->set_rules('password', lang('Password'), 'trim|required|min_length[6]|alpha_dash');
			$this->form_validation->set_rules('email', lang('Email'), 'trim|valid_email');

			if ($this->form_validation->run()) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');

				$user_data = array(
					'username' => $username,
					'password' => $password,
					'email' => trim($email),
				);

				if (!is_null($res = $this->user_model->create($user_data))) {
					//sign up successfully
					$this->session->set_flashdata(FLASH_SUCCESS_MESSAGE, 'Sign up successfully');
					redirect('login');
				}
			}
		}


		$this->load->view('user/join');
	}
}
