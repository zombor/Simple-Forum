<?php

abstract class Forum_Website_Controller extends Website_Controller {

	public function __construct()
	{
		parent::__construct();

		$view_name = 'forum/'.Router::$controller.'/'.Router::$method;

		if(Kohana::find_file('views', $view_name))
		{
			$this->template->content = $this->view = new View($view_name);
		}
		else
		{
			$this->view = $this->template->content = 'No template found.';
		}
		$this->template->title = '';
		new Profiler;
		//include_once Kohana::find_file('vendor', 'Markdown');
	}
}