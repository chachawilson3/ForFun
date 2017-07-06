<?php
require("includes/config.php");
require("includes/connect.php");


function display_dropdown($db,$select_name,$id_col, $display_name, $table_name)
{
	  print "<select name='$select_name'>";
	  print "<option value=''> $select_name</option>";     // first option is NULL option
	  $qry = "SELECT $id_col, $display_name FROM $table_name ORDER BY $display_name";
 //     print "$qry<br>" ;
	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error:  ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	 // print "$numrows<br>";
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row[$id_col];
             $name = $row[$display_name];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	
}

if (isset($_POST['add_event'])){
	if (isset($_POST['add_event'])) {      // /user hit submit
   // check the NOT NULL columns to be sure they have a value. 

	
	    // the next 4 post vars are NOT NULL so they should have a value
	    $date1=$_POST['date1'];
		$date2 = $_POST['date2'];
		$member_id = $_POST['member_id'];

        $query = 
		"INSERT INTO rentals(rental_start_date, rental_return_date, member_id) VALUES
		('$date1','$date2',$member_id)"; 
         $result = mysqli_query ($db, $query);
         if (!$result) 
             print "ERROR: on INSERT " . mysqli_error($db);
         else {
             print "<br>Rental Added <br>";
			 $rental_id = mysqli_last_id($db);
			 //$_SESSION['rental_id']=$rental_id;

		 } 
    }
}	


    

	
	

?>