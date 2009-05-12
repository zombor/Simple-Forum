<?php

class Forum_Controller extends Forum_Website_Controller {

	public function index()
	{
		$this->view->categories = Auto_Modeler_ORM::factory('forum_category')->fetch_all();
	}

	public function category($id)
	{
		$category = new Forum_Category_Model($id);
		$discussions = $category->find_related('forum_discussions');

		$this->view->category = $category;
		$this->view->discussions = $discussions;
	}

	public function discussion($id)
	{
		$discussion = new Forum_Discussion_Model($id);
		$comments = $discussion->find_related('forum_comments');

		$this->view->discussion = $discussion;
		$this->view->comments = $comments;
	}
}