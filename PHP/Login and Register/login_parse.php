<?php

// Include files
echo '<html>

<head>
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
        </html>';

    //Login Functions
    
    session_start();                    //To start sessional storage
    include("connect.php");             //To link to database
    include("forum_functions.php");     //To include neccessary functions
    
    $username = $_POST['username'];     //Gets username and password by the post method.
    $password = $_POST['password'];

    //CHecking If the User forgot to enter the Username or Password
    if ( $username == "" || $password == "")
    {
        echo ' <div class="alert alert-warning">Please fill in all the details <br/><br/> Please check if you forgot to enter data in any of the fields <br/></div>';
    }

    //Checking for invalid Username or short Password
    //The account will be fed to the database only if the above two conditions are satisfied.
    else
    {
     
        if( checkInvalidCharacters($username)) //If there are any invalid chars in username
            echo '  <style>
        body{
            font-family:  "Raleway", sans-serif !important;
            font-size: 20px;
        }
        
        .btn-dark{
            text-transform: uppercase;
            font-weight:bold;
            letter-spacing:0.5mm;
            padding: 15px 30px 15px 30px;
        }
    </style><body>

        <div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>                       
                    </div>
                </nav>
         </div>
    <div style=" margin-top:100px;">
        <div class="alert alert-warning">
  <b><center>Incorrect Username</center></b><br><br> Username can only contain :<br/><br/><ul><li> A to Z </li><li> a to z </li><li> 0 to 9 </li><li> . and _ </li></ul>
</div></body>';

        //To check if the user has created an account or not
        elseif (mysqli_num_rows(mysqli_query($link , "SELECT * FROM doctors WHERE username = '".$username."'")) == 0) 
        {
            echo '
    <style>
        body{
            font-family:  "Raleway", sans-serif !important;
            font-size: 20px;
        }
        
        .btn-dark{
            text-transform: uppercase;
            font-weight:bold;
            letter-spacing:0.5mm;
            padding: 15px 30px 15px 30px;
        }
    </style>


<body>

        <div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div>
    <div style="text-align: center; margin-top:100px;">
        <div class="alert alert-warning">
  <strong>Incorrect Username</strong><br><br> Please try again
</div>
       
        
        <br>
        
        <b>- OR -</b>
        <br>
        <br>
        
        <a href="register.php" class="btn btn-dark">Register</a></div>
</body>

</html>';
        }

        else                                  //If there are no invalid chars
        {
            $sql = "
                    SELECT password FROM doctors
                    WHERE username = ? LIMIT 1;
            ";

            $stmt = $link->prepare($sql);
            $stmt->bind_param('s' , $username);
            $stmt->execute();
            $stmt->bind_result($hashedPswd);

            $stmt->fetch();
            if(crypt($password , $hashedPswd) == $hashedPswd ) //If encrypting current password == encrypted password in database
            {
                echo '<style>
        body{
            font-family:  "Raleway", sans-serif !important;
            font-size: 20px;
        }
        
        .btn-dark{
            text-transform: uppercase;
            font-weight:bold;
            letter-spacing:0.5mm;
            padding: 15px 30px 15px 30px;
        }
    </style><body><div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-success text-center"<b>Successfully Logged In</b></div></div></body>';
                $_SESSION["username"] = $username;
                //header("Location : ");
                echo "<script>location='index.php'</script>";
            }
            else                                              //If not then...
            {
                echo '<div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Wrong Password</b><br/><br>Please enter the correct password </div></div> ';
            }
        }
    }




?>