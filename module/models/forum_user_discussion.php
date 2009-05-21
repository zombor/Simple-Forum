<?php

class Forum_User_Discussion_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_user_discussions';

	protected $data = array('id' => '',
	                        'user_id' => '',
	                        'forum_discussion_id' => '',
	                        'forum_comment_id' => '');

}