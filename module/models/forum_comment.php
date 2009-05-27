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
			return $this->db->from('users')->where('id', $this->data['user_id'])->get()->result(TRUE, 'Forum_User_Model')->current();
		}
		else
			return parent::__get($key);
	}
}