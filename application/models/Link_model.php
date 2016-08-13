<?php

class Link_model extends CI_Model {
	const TBL_NAME = 'link';

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}

	public function get($id)
	{
		$this->db->where('id', $id);

		$query = $this->db->get(self::TBL_NAME);
		return $query->row();
	}

	public function get_link_by_url($url)
	{
		$this->db->where('url', $url);

		$query = $this->db->get(self::TBL_NAME);
		return $query->row();
	}

	public function get_links_by_user_id($user_id)
	{
		$this->db->where('user_id', $user_id);

		$query = $this->db->get(self::TBL_NAME);
		return $query->result();
	}

	public function create($data)
	{
		$data['create_time'] = time();
		$data['update_time'] = time();

		if ($this->db->insert(self::TBL_NAME, $data)) {
			return $this->get($this->db->insert_id());
		}
		return NULL;
	}

}