<?php

class Forum_Discussion_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_discussions';

	protected $data = array('id' => '',
	                        'title' => '',
	                        'forum_category_id' => '',
	                        'date_created' => '',
	                        'user_id' => '',);
}