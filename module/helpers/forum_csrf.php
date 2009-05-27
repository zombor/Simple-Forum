<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * CSRF helper class.
 */

class forum_csrf_Core {

	public static function token()
	{
		if (($token = Session::instance()->get('csrf')) === FALSE)
			$_SESSION['csrf'] = text::random('alnum', 16);

		return $_SESSION['csrf'];
	}

	public static function valid($token)
	{
		return ($token === arr::remove('csrf', $_SESSION));
	}
}