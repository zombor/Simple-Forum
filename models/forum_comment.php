<?php

class Forum_Comment_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_comments';

	protected $data = array('id' => '',
	                        'title' => '',
	                        'user_id' => '',
	                        'content' => '',
	                        'forum_discussion_id' => '',
	                        'date' => '');
}