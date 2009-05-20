<?php

class Forum_Category_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'forum_categories';

	protected $data = array('id' => '',
	                        'name' => '',
	                        'order' => '',);

	public function find_newest_discussion()
	{
		return $this->db->from('forum_discussions')->where('forum_category_id', $this->id)->orderby('date_created', 'DESC')->limit(1)->get()->result(TRUE, 'Forum_Discussion_Model')->current();
	}
}