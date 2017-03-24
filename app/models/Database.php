<?php

namespace php_hackernews\app\Model;

class Database
{
	private static $instance;

	/**
	 * I do not get why this function was made static in arceus. 
	 * Googled. If it is static it can directly be called without
	 * creating any object.
	 */
	public static function get_instance()
	{
		if(!self::$instance)
		{
			//global $CONFIG; will use later on, hard coding for now
			$db_host = "localhost";
			$db_user = "root";
			$db_pass = "root123";
			$db_name = "news"; 

			try
			{
				self::$instance = new \PDO("mysql:host=$db_host;dbname=$db_name",
												$db_user,
												$db_pass
												);
				//why is \\PDO used in arceus code?googled, didnt find anything relevant
				self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	         	self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false); 
	         	echo "Connection ok";
	         }
	         catch(PDOException $e)
	         {
	         	echo "Err: " . $e->getMessage();
	         }
	         	
		}
		return self::$instance;
	}
}