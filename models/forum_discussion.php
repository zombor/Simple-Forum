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
		return $this->db->select('forum_discussions.*')->select(new Database_Expression('MAX(forum_comments.date) AS c_date'))->from('forum_discussions')->join('forum_comments', array('forum_comments.forum_discussion_id' => 'forum_discussions.id'))->limit($limit, ($page-1))->groupby('forum_discussions.id')->orderby('c_date', 'DESC')->get()->result(TRUE, 'Forum_Discussion_Model');
	}
}