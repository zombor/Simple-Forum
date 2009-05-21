<?php

class Forum_Discussion_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_discussions';

	protected $data = array('id' => '',
	                        'title' => '',
	                        'forum_category_id' => '',
	                        'date_created' => '',
	                        'user_id' => '',);

	protected $aliases = array('user' => 'forum_user');

	// Overloading get for forum_user
	public function __get($key)
	{
		if ($key == 'user')
		{
			return $this->db->from('users')->where('id', $this->data['user_id'])->get()->result(TRUE, 'Forum_User_Model')->current();
		}
		else
			return parent::__get($key);
	}

	public function find_discussions($limit = 20, $page = 1)
	{
		if ( ! empty($this->data['forum_category_id']))
			$this->db->where('forum_category_id', $this->forum_category_id);

		return $this->db->select('forum_discussions.*')
		                ->select(new Database_Expression('MAX(forum_comments.date) AS c_date'))
		                ->from('forum_discussions')
		                ->join('forum_comments', array('forum_comments.forum_discussion_id' => 'forum_discussions.id'))
		                ->limit($limit, ($page-1))
		                ->groupby('forum_discussions.id')
		                ->orderby('c_date', 'DESC')
		                ->get()->result(TRUE, 'Forum_Discussion_Model');
	}

	public function find_comments($limit = 20, $page = 1)
	{
		if ( ! empty($this->data['id']))
			$this->db->where('forum_discussion_id', $this->id);

		return $this->db->select('forum_comments.*')
		                ->from('forum_comments')
		                ->limit($limit, ($page-1)*$limit)
		                ->orderby('date', 'ASC')
		                ->get()->result(TRUE, 'Forum_Comment_Model');
	}

	public function find_newest_comment()
	{
		return $this->db->from('forum_comments')->where('forum_discussion_id', $this->id)->orderby('date', 'DESC')->limit(1)->get()->result(TRUE, 'Forum_Comment_Model')->current();
	}

	public function user_has_not_read($user_id)
	{
		return ! (bool) $this->db->from('forum_user_discussions')
		                       ->where(array('user_id' => $user_id, 'forum_discussion_id' => $this->data['id']))
		                       ->get()->count();
	}
}