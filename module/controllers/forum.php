<?php

class Forum_Controller extends Forum_Website_Controller {

	public function index()
	{
		$this->view->categories = Auto_Modeler_ORM::factory('forum_category')->fetch_all();
	}

	public function all_discussions()
	{
		$this->view->discussions = Auto_Modeler_ORM::factory('forum_discussion')->find_discussions();
	}

	public function category($id)
	{
		$page = $this->input->get('page', 1);

		$category = new Forum_Category_Model($id);
		$discussions = $category->find_discussions(20, $page);

		$this->view->category = $category;
		$this->view->discussions = $discussions;
		$this->view->num_pages = ceil(count($category->find_related('forum_discussions')) / 20);
	}

	public function discussion($id)
	{
		$page = $this->input->get('page', 1);

		include_once Kohana::find_file('vendor', 'Markdown');

		$discussion = new Forum_Discussion_Model($id);
		$comments = $discussion->find_comments(20, $page);

		$this->view->discussion = $discussion;
		$this->view->comments = $comments;
		$this->view->num_pages = ceil(count($discussion->find_related('forum_comments')) / 20);

		// If this user hasn't viewed this discussion, insert the view
		if ($discussion->user_has_not_read($_SESSION['forum_user']->id))
		{
			$user_discussion = new Forum_User_Discussion_Model();
			$user_discussion->user_id = $_SESSION['forum_user']->id;
			$user_discussion->forum_discussion_id = $discussion->id;
			$user_discussion->forum_comment_id = $discussion->find_newest_comment()->id;
			$user_discussion->save();
		}
	}

	public function create_discussion($category_id)
	{
		$this->view = $this->template->content = new View('forum/forum/discussion_form');
		$category = new Forum_Category_Model($category_id);
		$discussion = new Forum_Discussion_Model;
		$comment = new Forum_Comment_Model;

		$this->view->errors = '';
		$this->view->action = 'Create';

		$discussion->forum_category_id = $category->id;
		$discussion->date_created = time();
		$discussion->user_id = $_SESSION['forum_user']->id;
		$comment->date = time();
		$comment->user_id = $_SESSION['forum_user']->id;

		if ($_POST)
		{
			$comment->set_fields($_POST);
			$discussion->title = $_POST['title'];

			try
			{
				$discussion->save();
				$comment->forum_discussion_id = $discussion->id;
				$comment->save();
				url::redirect('forum/discussion/'.$discussion->id);
			}
			catch (Kohana_User_Exception $e)
			{
				$this->view->errors = $e;
			}
		}

		$this->view->category = $category;
		$this->view->discussion = $discussion;
		$this->view->comment = $comment;
	}

	public function create_comment($discussion_id)
	{
		$this->view = $this->template->content = new View('forum/forum/discussion_form');
		$discussion = new Forum_Discussion_Model($discussion_id);
		$comment = new Forum_Comment_Model;

		$this->view->errors = '';
		$this->view->action = 'Create';

		$comment->forum_discussion_id = $discussion->id;
		$comment->date = time();
		$comment->user_id = $_SESSION['forum_user']->id;

		if ($_POST)
		{
			$comment->set_fields($_POST);

			try
			{
				$comment->save();
				url::redirect('forum/discussion/'.$discussion->id);
			}
			catch (Kohana_User_Exception $e)
			{
				$this->view->errors = $e;
			}
		}

		$this->view->discussion = $discussion;
		$this->view->comment = $comment;
	}
}