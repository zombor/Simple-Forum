<?php
include Kohana::find_file('controllers', 'admin/admin_forum_website');
class Forum_Controller extends Admin_Forum_Website_Controller {

	public function create_category()
	{
		$this->view = $this->template->content = new View('forum/admin/forum/category_form');
		$category = new Forum_Category_Model();

		$this->view->errors = '';
		$this->view->action = 'Create';

		if ($_POST)
		{
			$category->set_fields($_POST);

			try
			{
				$category->save();
				url::redirect('forum/index');
			}
			catch (Kohana_User_Exception $e)
			{
				$this->view->errors = $e;
			}
		}
		
		$this->view->category = $category;
	}

	public function edit_comment($comment_id)
	{
		$comment = new Forum_Comment_Model($comment_id);

		if ($comment->user->id != $_SESSION['forum_user']->id OR ! Auth::instance()->logged_in('admin'))
			Event::run('system.404');

		$this->view = $this->template->content = new View('forum/forum/discussion_form');
		$this->view->errors = '';

		if ($_POST)
		{
			$comment->set_fields($_POST);

			try
			{
				$comment->save();

				url::redirect('forum/discussion/'.$comment->forum_discussion_id);
			}
			catch (Kohana_User_Exception $e)
			{
				$this->view->errors = $e;
			}
		}

		$this->view->comment = $comment;
	}

	public function delete_comment($comment_id)
	{
		$this->view = $this->template->content = new View('forum/admin/forum/delete_comment');

		$comment = new Forum_Comment_Model($comment_id);

		if (($comment->user->id != $_SESSION['forum_user']->id) OR ! Auth::instance()->logged_in('admin'))
			Event::run('system.404');

		if(isset($_POST['confirm']))
		{
			$comment->delete();
			url::redirect('forum/discussion/'.$comment->forum_discussion_id);
		}
		elseif(isset($_POST['cancel']))
		{
			url::redirect('forum/discussion/'.$comment->forum_discussion_id);
		}
		//die('wtf');
	}
}