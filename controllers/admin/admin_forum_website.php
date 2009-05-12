<?php

abstract class Admin_Forum_Website_Controller extends Forum_Website_Controller {

	public function __construct()
	{
		parent::__construct();

		$view_name = 'forum/admin/'.Router::$controller.'/'.Router::$method;

		if(Kohana::find_file('views', $view_name))
		{
			$this->template->content = $this->view = new View($view_name);
		}
		else
		{
			$this->view = $this->template->content = 'No template found.';
		}
	}
}