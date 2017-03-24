<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
require_once("./models/Link.php");
use php_hackernews\app\Model\Link;
session_start();

class Upvote
{
	function get($url)
	{
		if(isset($_SESSION["email"]))
		{
			echo "upvote controller";
			echo "<br>";
			Link::upvote_link($url);
			$template = "./views/upvote.php";
			Render::_render($template,array("url" => $url));
		}
		else
		{
			header("Location: /");
			exit();
		}
	}
}