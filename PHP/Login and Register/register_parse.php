<?php

if(isset($_GET['submit']) && !empty($_GET['captcha']) && isset($_SESSION['secure'])){
    if ($_SESSION['secure'] == $_GET['captcha'])
        echo 'Succsess!';
    else
        echo 'Please refresh and re-enter the captcha';
}

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
    session_start();
    include("connect.php");
    $doctorname = @$_SESSION["username"];
    //include("forum_functions.php");
 
    $firstname = $_POST['name1'];
    $lastname = $_POST['name2'];
    $number   = $_POST['name3'] ;

    //echo "First name :" . $firstname . "<br><br>Last name:" . $lastname . "<br><br> Number:" . $number;

     if ((strlen($number) == 10 || strlen($number) == 12) && is_numeric($number)) 
{                   
    $sql = "INSERT INTO patients(firstname , lastname , ph_number , doctor_name)
            VALUES ( ? , ? , ? , ?);
            ";

    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssds' , $firstname , $lastname , $number , $doctorname);

    if($stmt->execute())
    {
        echo '<div class="wrapper">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="" style="color:#fff;">Assista</a>
                        </div>
                        
        
                    </div>
                </nav>
            </div>
            <div style="text-align: center; margin-top:100px;">
            <div class="alert alert-success text-center"><b>Successfully Registered</b> as :   ' . $firstname . '  ' . $lastname . ' </div><br/><br/>
            </div>';
        $patientname = $firstname . " " . $lastname;
        $_SESSION["patient_name"] = $patientname;
        $sql1 = "SELECT id , ph_number FROM patients WHERE firstname = '".$firstname."' and lastname = '".$lastname."'";
        $result1 = mysqli_query($link , $sql1);
    while($row = mysqli_fetch_array($result1)){
        if($row['ph_number'] == $number):
            $p_id = $row['id'];
            $_SESSION["p_id"] = $p_id;
        else:
            continue;
        endif;}

        echo "<script>location='index2.php'</script>";
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
            </div>
<div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Registration Failed</b><br/><br></div></div> ';
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
            </div><div style="text-align: center; margin-top:100px;"><div class="alert alert-warning text-center"><b>Invalid phone number</b><br/><br>Please go back <a href = "index1.php"><--</a> to enter the details again</div></div> ';
    }
     

?>