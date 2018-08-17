<?php


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

    include("connect.php");
    include("forum_functions.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repass   = $_POST['repass'] ;
    $phone_no   = $_POST['phone_no'] ;

/*     $elements = explode("@" , $username);
    $domain_name = $elements[1];

    $accepted_domains = array("gmail.com" , "hotmail.com" , "yahoo.com" , "outlook.com" , "inbox.com"); */

    if ($repass == $password) 
    {
    
        $minpl = 8;

    /* echo "Registeration Details  : ";
    echo "Username : " . $username . "<br/><br/> Password : " . $password; */

    //CHecking If the User forgot to enter the Username or Password
    if ( $username == "" || $password == ""){
        echo "Please fill in all the details <br/> Please check if you forgot to enter data in any of the fields <br/>";
    }

    //Checking for invalid Username or short Password
    //The account will be fed to the database only if the above two conditions are satisfied.
    else 
    {
        if( checkInvalidCharacters($username) )
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
                            <a class="navbar-brand" href="index.php" style="color:#fff;">Assista</a>
                        </div>                       
                    </div>
                </nav>
         </div>
    <div style=" margin-top:100px;">
        <div class="alert alert-warning">
  <b><center>Incorrect Username</center></b><br><br> Username can only contain :<br/><br/><ul><li> A to Z </li><li> a to z </li><li> 0 to 9 </li><li> . and _ </li></ul>
</div></body>';

        else 
        {
            if (strlen($password) >= $minpl) 
            {
                    $password = encrypt_pswd($password);
                    
                    $sql = "INSERT INTO doctors(username , password , phone_no)
                            VALUES ( ? , ? , ? );
                            ";

                    $stmt = $link->prepare($sql);
                    $stmt->bind_param('sss' , $username , $password , $phone_no);

                    //$res = mysqli_query($link , $sql);

                    if($stmt->execute())
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
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-success text-center"<b>Successfully Registered</b> as : <br><br> ' . $username . '
            <br/><br/>
            <a href="login.php" class="btn btn-dark">Log In</a>
            </div></div></body>';
                $_SESSION["username"] = $username;
                    }
    
                    else 
                    {
                      
                echo '<div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Registration failed</b></div></div> ';
                        echo "Error is =>   " . mysqli_error($link);
                    }

                
            }

            else {
              
                echo '<div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Password is too short</b><br/><br>Minimum length is 8 characters </div></div> ';
            }
        }
    }
     
    }

    else 
    {
echo '<div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Passwords do not match</b><br/><br>Please enter the correct password </div></div> ';    }

     

?>