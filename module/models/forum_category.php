<?php

class Forum_Category_Model extends CSRF_Model
{
	protected $table_name = 'forum_categories';

	protected $data = array('id' => '',
	                        'name' => '',
	                        'order' => '',
	                        'description' => '');

	public function find_newest_discussion_comment()
	{
		return $this->db->from('forum_discussions')->where('forum_category_id', $this->id)->orderby('date_created', 'DESC')->limit(1)->get()->result(TRUE, 'Forum_Discussion_Model')->current()->find_newest_comment();
	}

	public function find_discussions($limit = 20, $page = 1)
	{
		if ( ! empty($this->data['id']))
			$this->db->where('forum_category_id', $this->id);

		return $this->db->select('forum_discussions.*')
		                ->select(new Database_Expression('MAX(forum_comments.date) AS c_date'))
		                ->from('forum_discussions')
		                ->join('forum_comments', array('forum_comments.forum_discussion_id' => 'forum_discussions.id'))
		                ->limit($limit, ($page-1)*$limit)
		                ->groupby('forum_discussions.id')
		                ->orderby('c_date', 'DESC')
		                ->get()->result(TRUE, 'Forum_Discussion_Model');
	}
}