<!DOCTYPE html>
<html>
<body>
here

URL: <input type="text" name="url"><br>
<button>SUBMIT</button><br>
<script src="/assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        var url = $("input").val();
        if(url)
        {   $.ajax({
                url     : '/submitLink',
                type  : 'POST',
                data    : { 'url': url },
                success : function( response ) {
                    //alert( response );
                }
            });
        }
    });
});
</script>


<a href = "/viewLinks">News Feed</a>
<br><br>
<form action = "/logout" method = "get">
	<input type="submit" name="submit_button" value="Logout" />
</form>
</body>
</html>