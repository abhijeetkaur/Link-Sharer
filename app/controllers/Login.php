<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
require_once("./models/Database.php");
use php_hackernews\app\Model\Database;
require_once("./models/User.php");
use php_hackernews\app\Model\User;
session_start();

class Login
{
	function get()
	{
		if(isset($_SESSION["email"]))
		{
			header("Location: viewLinks");
			exit();
		}
		$template = "./views/login.php";
		Render::_render($template);
	}
	function post()
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$obj = User::get_by_email($email);

		if($obj == null)
		{
			header("Location: register");
			exit();
		}
		
		if($obj->verify_password($pass))
		{
			$_SESSION["email"] = $email;
			header("Location: viewLinks");
			exit();
		}
		else
		{
			echo "Sorry, wrong password";
			$template = "./views/login.php";
			Render::_render($template);
		}

	}
}