<?php
//this file is separately run by the command >php create_db.php
//One needs to be in this directory for this
try 
{
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "root123"; 

	$conn = new \PDO("mysql:host=$db_host",	$db_user, $db_pass);
	$conn->exec("CREATE DATABASE news");
	echo "db created successfully";
} 
catch (PDOException $e) 
{
	echo "error : ".$e->getMessage();
}