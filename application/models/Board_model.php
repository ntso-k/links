<?php

class Board_model extends CI_Model {
	const TBL_NAME = 'board';

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}

	public function create($data)
	{
		$data['create_time'] = time();
		$data['update_time'] = time();
		$data['index'] = $this->get_max_index($data['user_id']) + 1;

		if ($this->db->insert(self::TBL_NAME, $data)) {
			return $this->db->insert_id();
		}
		return NULL;
	}

	public function get($id)
	{
		$this->db->where('id', $id);

		$query = $this->db->get(self::TBL_NAME);
		return $query->row();
	}

	public function get_boards_by_user_id($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->order_by('index', 'ASC');

		$query = $this->db->get(self::TBL_NAME);
		return $query->result();
	}

	public function get_max_index($user_id)
	{
		$this->db->select_max('index');
		$this->db->where('user_id', $user_id);

		$row = $this->db->get(self::TBL_NAME)->row();
		if ($row) {
			return $row->index;
		}

		return 0;
	}

}