
<!DOCTYPE html>
<html>
<head>
	<title>PHP Censor Board</title>
</head>
<body>

<form method = 'post'>
	<input type="textarea" name="user_input">
	<input type="submit" name="user_submit">
</form>

<?php

if(isset($_POST['user_submit']) && !empty($_POST['user_input']))
{
	$cuss_array = array();//will add cusswords
}

?>


</body>
</html>