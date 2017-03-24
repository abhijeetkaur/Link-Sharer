<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
session_start();

class Logout
{
	function get()
	{
		session_unset();
		session_destroy();
		echo "User Successfully logged out";
		$template = "./views/home.php";
		Render::_render($template);
	}
}
?>