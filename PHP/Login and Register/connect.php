<?php

    //Connecting to the Database
    $database = array();
    $database['host'] = "shareddb-i.hosting.stackcp.net";
    $database['port'] = "3306";
    $database['name'] = "hospital-test-3337319d";
    $database['username'] = "hospital-test-3337319d";
    $database['password'] = "9g910f7ut7";
    
    $link = mysqli_connect($database['host'] , $database['username'] , $database['password'] , $database['name'] );

    if($link){
        //echo "<b>Successfully</b> connected to database   :  " . $database['name'] . "<br/><br/>";
    }
    else {
        echo "Conection to database  " . $database['name'] . " <b>FAILED</b> <br/>";
        echo "Error is =>   " . mysql_error();
    }

?>