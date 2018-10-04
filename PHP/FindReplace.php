<?php

if(isset($_POST['user_submit']) && !empty($_POST['user_input']) && !empty($_POST['find']) && !empty($_POST['replace']))
{
    //echo 'here';
    $user_input = $_POST['user_input'];
    $find = $_POST['find'];
    $find_length = strlen($find);
    $replace = $_POST['replace'];
    $replace_length = strlen($replace);

    $index = 0 ;
    
    while ($pos = strpos($user_input , $find , $index)) {
        
        $index = $pos + $find_length;
        //echo $index . "<br>" . $pos ;
        $user_input = substr_replace( $user_input , $replace , $pos , $find_length);



    }

    echo "<br><br>The new string is <br><br><hr><br><h3>" . $user_input . "</h3><br><hr>";


}



?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Censor Board</title>
</head>
<body>

<form method = 'post' action = "index.php">
    Enter the String<br>
	<textarea name="user_input" rows = "10" cols = "52"></textarea>
    <br><hr><br>
    Find :<br>
    <input type = "text" name = "find">
    <br><hr><br>
    Repalce it with:<br>
    <input type = "text" name = "replace">
    <br><hr><br>
	<input type="submit" name="user_submit" value = "SUBMIT">
</form>




</body>
</html>