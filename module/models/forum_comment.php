<?php

class Forum_Comment_Model extends CSRF_Model
{
	protected $table_name = 'forum_comments';

	protected $data = array('id' => '',
	                        'title' => '',
	                        'user_id' => '',
	                        'content' => '',
	                        'forum_discussion_id' => '',
	                        'date' => '');


	// Overloading get for forum_user
	public function __get($key)
	{
		if ($key == 'user')
		{
			// This should be optimized to something better
			if ($_SESSION['forum_user'] instanceof ORM)
				return ORM::factory('forum_user', $this->data['user_id']);
			else
				return $this->db->from('users')->where('id', $this->data['user_id'])->get()->result(TRUE, 'Forum_User_Model')->current();
		}
		else
			return parent::__get($key);
	}
}