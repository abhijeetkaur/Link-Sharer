<?php

namespace php_hackernews\app\Controller;
require_once("./lib/Render.php");		
use php_hackernews\app\lib\Render;
session_start();
/**
 * with line 4 and without line 5. Error: 
 * PHP Fatal error:  Class 'php_hackernews\\app\\Controller\\Render' not found in 
 * /home/abhijeet/Desktop/tasks/php-hackernews/app/controllers/Home.php on line 12
 *
 * without line 4 and with line 4.(As in arceus code). Error:
 * PHP Fatal error:  Class 'php_hackernews\\app\\lib\\Render' not found in 
 * /home/abhijeet/Desktop/tasks/php-hackernews/app/controllers/Home.php on line 12
 * 
 * http://stackoverflow.com/questions/5350270/php-namespaces-and-require
 */


class Home
{
	function get()
	{
		if(isset($_SESSION["email"]))
		{
			header("Location: viewLinks");
			exit();
		}
		$template = "./views/home.php";
		Render::_render($template);
		//global $app;				//app 
		//$app->render("home.php");	//how will it search in views?
	}
}
