<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
require_once("./models/Link.php");
use php_hackernews\app\Model\Link;
require_once("./models/User.php");
use php_hackernews\app\Model\User;
session_start();

class SubmitLink
{
	function get()
	{
		if(isset($_SESSION["email"]))
		{
			$template = "./views/submitLink.php";
			Render::_render($template);
		}
		else
		{
			header("Location: /");
			exit();
		}
	}
	function post()
	{
		if(isset($_SESSION["email"]))
		{
			$name = User::get_name_by_email($_SESSION["email"]);
			$url = $_POST["url"];
			Link::create($name,$url);		//A bit of an error here in links table, since I am assuming email to
											//be unique, I should have created columns in `links` as email and url
											//Assumptions for php_hackernews: names as well as emails should be unique
			//header("Location: viewLinks");
			exit();
		}
		else
		{
			header("Location: /");
			exit();
		}
	}
}