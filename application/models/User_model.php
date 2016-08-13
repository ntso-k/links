<?php

class User_model extends CI_Model {
	const TBL_NAME = 'user';

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}

	public function get_last_ten_entries()
	{
		$query = $this->db->get(self::TBL_NAME, 10);
		return $query->result();
	}

	public function get_user_by_username($username)
	{
		$this->db->where('username', $username);

		$query = $this->db->get(self::TBL_NAME);
		if ($query->num_rows() == 1) {
			return $query->row();
		}
		return NULL;
	}

	public function create($data, $activated = TRUE)
	{
		$data['password'] = md5($data['password']);
		$data['active'] = $activated ? 1 : 0;
		$data['create_time'] = time();
		$data['update_time'] = time();

		if ($this->db->insert(self::TBL_NAME, $data)) {
			$id = $this->db->insert_id();
//			if ($activated) {
//				$this->create_profile($id);
//			}
			$this->load->model('Board_model');
			$this->Board_model->create(array('title'=>'default', 'user_id'=>$id));

			return array(
				'id' => $id
			);
		}
		return NULL;
	}

	public function get_current_user()
	{
		return $this->session->userdata('user');
	}

	public function get_user_id()
	{
		$user = $this->get_current_user();

		if ($user) {
			return $user->id;
		}

		return null;
	}

	public function is_logged_in()
	{
		return $this->session->has_userdata('user');
	}

	public function login($username, $password, $remember)
	{
		if (!is_null($user = $this->get_user_by_username($username))) {
			if (md5($password) == $user->password) {
				$this->session->set_userdata('user', $user);

				if ($remember) {
					//TODO
//					$this->create_autologin($user->id);
				}

				$this->update_login_info($user->id);

				return TRUE;
			}

		}

		return FALSE;
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	function update_login_info ($user_id)
	{
		$this->db->set('last_ip', $this->input->ip_address());
		$this->db->set('last_login_time', time());

		$this->db->where('id', $user_id);
		$this->db->update(self::TBL_NAME);
	}

}