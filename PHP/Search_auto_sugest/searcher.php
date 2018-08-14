<?php 
session_start();

include("connect.php");

$search_input = $_POST['query']; 
$min_length = 1;
     
     if(strlen($search_input) >= $min_length)// if query length is more or equal minimum length then
     {        
        $search_input = htmlspecialchars($search_input); // changes characters used in html to their equivalents, for example: < to &gt;
        $search_input = mysqli_real_escape_string($link , $search_input); // makes sure nobody uses SQL injection
        //echo $search_input;
        
        //$results = mysqli_query($link , "SELECT * FROM table
        //    WHERE ((column LIKE '".$search_input."%') OR (column LIKE '".$search_input."%') OR (column LIKE '%".$search_input."%')))  or die(mysqli_error()) ;
        
        //  $results will have the rows outputed by the a sql query
        $data = array();

        //echo mysqli_num_rows($raw_results);
        if(mysqli_num_rows($results) > 0){ // if one or more rows are returned do following

            
             
            while($row = mysqli_fetch_assoc($results)){

                //$data[] = $row['attribute'] . "  " . $row['attribute'] . " || Ph. No. :- " . $dig3;
                // This will contain the data to be displayed in the auto-sugest dropdown
                //echo "<p><h3>".$results['attribute'].$results['attribute'].$results['attribute']."</h3>"."</p>";
                // Highlighting the part of the result that matches with the search_item
            }
            echo json_encode($data); //Displaying data
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }

?>