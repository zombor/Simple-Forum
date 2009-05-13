<?php

class Forum_User_Model extends User_Model {

	// Put any custom variable fetching here
	public function __get($key)
	{
		switch ($key)
		{
			case 'name':
				return $this->first_name.' '.$this->last_name;
			default:
				return parent::__get($key);
		}
	}
}