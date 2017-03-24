<?php

namespace php_hackernews\app\Model;

class User
{
    protected $id;
	protected $name;
	protected $email;
	protected $password;

    public function __construct($id, $user_params = null)
  	{
        if($user_params === null)
        {
            $query = Database::get_instance()->prepare("
            SELECT *
            FROM `users`
            WHERE `id` = :id");

        $query->execute(array("id" => $id));
        $user_params = $query->fetch(\PDO::FETCH_ASSOC);
        }
	    $this->update_user_params($user_params);
    }

    public static function encrypt_password($password) 
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function create($name,$email,$password)
    {
        $obj = Database::get_instance();
        if(!$obj)
        {
            echo "oh no";
        }
        $query = $obj->prepare("
            INSERT INTO news.users(`name`, `email`, `password`)
            VALUES(:name, :email, :password)");

        if (!$query) 
        {
            echo "\nPDO::errorInfo():\n";
            print_r($query->errorInfo());
        }

        $query->execute(array(
            "name"        => $name,
            "email"       => $email,
            "password"    => self::encrypt_password($password),
            ));
        if (!$query) 
        {
            echo "\nPDO::errorInfo():\n";
            print_r($query->errorInfo());
        }
    }

    public function update_user_params($user_params)
    {
        $this->name = $user_params["name"];
        $this->email = $user_params["email"];
        $this->password = $user_params["password"];
    }

    public static function get_by_email($email)
    {
        $query = Database::get_instance()->prepare("
            SELECT *
            FROM news.users
            WHERE `email` = :email");

        $query->execute(array("email" => $email));
        $user_params = $query->fetch(\PDO::FETCH_ASSOC);

        if($query->rowCount() > 0)
        {
            return new static($user_params["id"],$user_params);
        }
        else
        {
            return null;
        }
    }

    public static function get_name_by_email($email)
    {
        $query = Database::get_instance()->prepare("
                    SELECT `name`
                    FROM `users`
                    WHERE `email` = :email");
        $query->execute(array("email" => $email));
        $user_params = $query->fetch(\PDO::FETCH_ASSOC);

        return $user_params["name"];
    }

    public function verify_password($password)
    {
        return password_verify($password, $this->password);
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_name()
    {
        return $this->name;
    }

}
?>