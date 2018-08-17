<?php
session_start();

$_SESSION['secure'] = rand(1000 , 9999);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="register.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8 wrapper2">

                <h1>Register</h1>

                <div class="form1">
                    <form action = "register_parse_doc.php" method = "POST">
                            <input type="email" name="username" class="question" id="unme" required autocomplete="new-password" />
                            <label for="unme">
                                <span>Email</span>
                            </label>
                            <br>
                            <br>
                      		<br>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="password" name="password" class="question" id="pass" required autocomplete="new-password" pattern=".{8,}" title="Minimum 8 characters required"/>
                                <label for="pass">
                                    <span>Password</span>
                                </label>
                            </div>


                            <div class="col-sm-6">
                                <input type="password" name="repass" class="question" id="cpass" required autocomplete="new-password" pattern=".{8,}" title="Minimum 8 characters required"/>
                                <label for="cpass">
                                    <span>Confirm Password</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <br>
                      	<br>
                        <input type="text" name="phone_no" class="question" id="num" required autocomplete="new-password" pattern="[0-9]{10}">
                        <label for="num">
                            <span>Phone Number</span>
                        </label>
                        <br>
                        <br> 
                        <image src = 'captcha_generator.php' class="question" id="cap"/>
                        <br>
                        <br>
                        <br>
                        <br>                       
                        <input type = "text" name = 'captcha' class="question" id="cap" required>
                        <label for="cap">
                            <span>Enter the captcha code:</span>
                        </label>
                        <br>
                        <br>
                        <input type="submit" value="Register" />
                        <br>
                        <br>
                    </form>
                    

                </div>

               

            </div>
            <div class="col-sm-2">

            </div>
        </div>

    </div>


</body>

</html>


