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
}