<?php

class Forum_Category_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_categories';

	protected $data = array('id' => '',
	                        'name' => '',
	                        'order' => '',);
}