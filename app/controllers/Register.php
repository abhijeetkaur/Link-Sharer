<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
require_once("./models/Database.php");
use php_hackernews\app\Model\Database;
require_once("./models/User.php");
use php_hackernews\app\Model\User;

class Register
{
	function get()
	{
		if(isset($_SESSION["email"]))
		{
			header("Location: viewLinks");
			exit();
		}
		$template = "./views/register.php";
		Render::_render($template);
	}
	function post()
	{
		echo "Processing submition";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		
		User::create($name,$email,$pass);
		header("Location: login");
		exit();
	}
}