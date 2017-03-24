<?php
require("../vendor/autoload.php");
require("./controllers/Home.php");
require("./controllers/Login.php");
require("./controllers/Register.php");
require("./controllers/ViewLinks.php");
require("./controllers/Upvote.php");
require("./controllers/SubmitLink.php");
require("./controllers/Logout.php");

echo "index";

ToroHook::add("404",  function() {echo "no route found";});
Toro::serve(array(
    "/" => "php_hackernews\app\Controller\Home",
    "/login" => "php_hackernews\app\Controller\Login",
    "/register" => "php_hackernews\app\Controller\Register",
    "/viewLinks" => "php_hackernews\app\Controller\ViewLinks",
    "/upvote/([a-zA-Z0-9-_.\/]+)" => "php_hackernews\app\Controller\Upvote",
    "/submitLink" => "php_hackernews\app\Controller\SubmitLink",
    "/logout" => "php_hackernews\app\Controller\Logout"
));

