<?php

namespace php_hackernews\app\Model;

class Link
{
	protected $url;
	protected $name;
	protected $upvotes;

	function __construct($id, $linkparams = null)
	{
		if($linkparams === null)
		{
			$query = Database::get_instance()->prepare("
				SELECT *
				FROM `links`
				WHERE `id` = :id");
			$query->execute(array("id" => $id));
			$linkparams = $query->fetch(\PDO::FETCH_ASSOC);
		}
		$this->update_link_params($linkparams);
	}

	function update_link_params($linkparams)
	{
		$this->name = $linkparams["name"];
		$this->url = $linkparams["url"];
		$this->upvotes = $linkparams["upvotes"];
	}

	public static function create($name,$url,$upvotes=0)
    {
        $query = Database::get_instance()->prepare("
            INSERT INTO news.links( `name`, `url`,`upvotes`)
            VALUES(:name , :url , :upvotes)");

        $query->execute(array(
            "name"        => $name,
            "url"		  => $url,
            "upvotes"	  => $upvotes
            ));
    }
    public static function get_all_links()
    {
    	echo "In get_all_links";
    	echo "<br>";
    	$query = Database::get_instance()->prepare("
            SELECT *
            FROM `links`");
    	$query->execute();
    	$all_links = $query->fetchAll(\PDO::FETCH_ASSOC);
    	echo "fetched query";
    	echo "<br>";
    	
    	return $all_links;

    }

    public static function get_link_by_url($url)
    {
    	$query = Database::get_instance()->prepare("
    			SELECT *
    			FROM `links`
    			WHERE `url` = :url");
    	$query->execute(array("url" => $url));
    	$link = $query->fetch(\PDO::FETCH_ASSOC);
    	return $link;
    }

    public static function upvote_link($url)
    {
    	echo "     in upvote_link";
    	echo "<br>";
    	$link = Link::get_link_by_url($url);
    	$query = Database::get_instance()->prepare("
    			UPDATE `links`
    			SET `upvotes` = `upvotes` + 1
    			WHERE `id` = :id");
    	$query->execute(array("id" => ($link['id'])));
    	echo "query executed";
    	echo "<br>";
    }

    public function get_link()
	{
		return $this->link;
	}
	public function get_name()
	{
		return $this->name;
	}
	public function get_upvotes()
	{
		return $this->upvotes;
	}

	
}
?>