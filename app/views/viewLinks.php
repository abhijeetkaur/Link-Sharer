<!DOCTYPE html>
<html>
<body>
<form action = "/submitLink" method = "get">
<input type="submit" name="submit_button" value="Submit Link" />
</form> 
</body>
</html>
<?php

foreach($all_links as $link)
{
	echo "<br><br>";
	echo "------------------------------------";
	echo "author: ".$link['name'];
	echo "<br>";
	echo "url: ".$link['url'];
	echo "<br>";
	echo "No. of upvotes: ".$link['upvotes'];
	echo "<br>";
	echo "<a href=\"/upvote/".$link['url']."\">Upvote</a>";
}
?>

<html>
<body>
	<form action = "/logout" method = "get">
		<input type="submit" name="submit_button" value="Logout" />
	</form>
</body>
</html>