<?php

class Auth extends Auth_Core {
	
	public function logout($destroy = FALSE)
	{
		unset($_SESSION['forum_user']);

		parent::logout($destroy);
	}
}