<?php
session_start();

if(isset($_GET['submit']) && !empty($_GET['captcha']) && isset($_SESSION['secure'])){
    if ($_SESSION['secure'] == $_GET['captcha'])
        echo 'Succsess!';
    else
        echo 'Please refresh and re-enter the captcha';
}

$_SESSION['secure'] = rand(1000 , 9999);


?>

<form action = 'index.php' method = 'get'>
<image src = 'captcha_generator.php'/>
Enter the captcha code:
<input type = 'text' name = 'captcha' required>
<input type = 'submit' name = 'submit'>
<form>