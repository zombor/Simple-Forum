<?php

class CSRF_Model extends Auto_Modeler_ORM
{
	protected function check_csrf(Validation &$validation)
	{
		$validation->add_rules('csrf', array('forum_csrf', 'valid'));
	}
}