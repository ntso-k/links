<?php

class Bookmark_model extends CI_Model {
	const TBL_NAME = 'bookmark';

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
		$data['index'] = $this->get_max_index($data['board_id']) + 1;

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

	public function delete($id)
	{
		$this->db->delete(self::TBL_NAME, array('id' => $id));
	}

	public function deleteByBoardId($board_id)
	{
		$this->db->delete(self::TBL_NAME, array('board_id' => $board_id));
	}

	public function get_bookmarks_by_board_id($board_id)
	{
		$this->db->select('bookmark.*, link.title, link.url, link.icon_url');
		$this->db->from('bookmark');
		$this->db->join('link', 'bookmark.link_id = link.id');
		$this->db->where('bookmark.board_id', $board_id);
		$this->db->order_by('bookmark.index', 'ASC');
		return $this->db->get()->result();
	}

	public function get_bookmark_by_board_link($board_id, $link_id)
	{
		$this->db->where('board_id', $board_id);
		$this->db->where('link_id', $link_id);

		$query = $this->db->get(self::TBL_NAME);
		return $query->row();
	}

	public function get_max_index($board_id)
	{
		$this->db->select_max('index');
		$this->db->where('board_id', $board_id);

		$row = $this->db->get(self::TBL_NAME)->row();
		if ($row) {
			return $row->index;
		}

		return 0;
	}

}