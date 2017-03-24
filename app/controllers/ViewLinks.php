<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
require_once("./models/Link.php");
use php_hackernews\app\Model\Link;
session_start();

class ViewLinks
{
	function get()
	{
		if(isset($_SESSION["email"]))
		{
			echo "view link";
			$template = "./views/viewLinks.php";
			$all_links = Link::get_all_links();
			
			Render::_render($template, array("all_links" => $all_links));
		}
		else
		{
			header("Location: /");
			exit();
		}

	}
}