<?php 
include "header.php";
include "includes/config.php";
include "includes/connect.php";
?>

<div id="wrapper">
<body>
<?PHP
//---------------------------------------------------------------------------
function display_pokemon_dropdown($db)
{
	  print "<select name='pokemon'>";
	  print "<option value=''>POKEMON</option>";     // first option is NULL option
	  $qry = "SELECT dex_number, name FROM pokemon";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on evolves dropdown: ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row['dex_number'];
             $name = $row['name'];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	
}

//---------------------------------------------------------------------------
function display_location_dropdown($db, $num)
{
	  print "<select name='location'>";
	  print "<option value=''>SELECT LOCATION</option>";     // first option is NULL option
	  $qry = "SELECT location_id, name FROM locations";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on type dropdown: ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row['location_id'];
             $name = $row['name'];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	

}


//---------------------------EXECUTION STARTS HERE  ------------------------------

// Add a new pokemon to the database. Use lookup tables for the some of the fields. 
// print_r ($_POST);

if (isset($_POST['add_new_location'])) {      // /user hit submit
   // check the NOT NULL columns to be sure they have a value. 
   if (!isset($_POST['pokemon']) ||
		!isset($_POST['location']))
	        print "Please fill out all the required fields marked with *<br>";
	else {
	    // the next 4 post vars are NOT NULL so they should have a value
	    $pokemon = $_POST['pokemon'];
		$location = $_POST['location'];
	 
        $query = 
		"INSERT INTO catch_locations VALUES
		('$pokemon', '$location', '0')";
         
         $result = mysqli_query ($db, $query);
         if (!$result) 
             print "ERROR: Set Location Failed on INSERT " . mysqli_error($db);
         else {
             print "<br>Location Set <br>";
			/* print "<form>";
             print "<button type='button' onclick=\"window.location='add_new_location.php';\">Set Another Location</button>";
			 print "</form>"; */
		 } 
    } 
}	
else {  
// otherwise display the form   
?>
   
<!-- 
DISPLY THE FORM TO ENTER A NEW POKEMON
-->
<h2> Set Location</h2>
<p> * required field</p>
<form method = 'post' >
<table class="data-input">
<tr>
	<td>Pokmon:</td>
   <td><?php display_pokemon_dropdown($db,1);?>*</td>
</tr><tr>
	<td>Location:</td>
   <td><?php display_location_dropdown($db,1);?>*</td>
</tr><tr>
	<td>&nbsp</td>
	<td><input type='submit' name='add_new_location' value='Set Location'/></td>
</tr>
</table>

</form>
</div>
<?php
}
include "footer.php";
?>