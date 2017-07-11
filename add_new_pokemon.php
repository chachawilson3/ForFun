<?php 
include "header.php";
include "includes/config.php";
include "includes/connect.php";
?>

<div id="wrapper">
<body>

<?PHP
//---------------------------------------------------------------------------
function display_evolves_dropdown($db)
{
	  print "<select name='evolve'>";
	  print "<option value=''>EVOLVES TO</option>";     // first option is NULL option
	  $qry = "SELECT dex_number, name FROM pokemon ORDER BY name";

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
//---------------------------------------------------------------------	   

      
function display_ability_dropdown($db, $num)
{
	  print "<select name='ability_$num'>";
	  print "<option value=''>SELECT ABILITY</option>";     // first option is NULL option
	  $qry = "SELECT ability_id, name FROM abilities ORDER BY name";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on ability dropdown: ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row['ability_id'];
             $name = $row['name'];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	
}
//---------------------------------------------------------------------	   
function display_type_dropdown($db, $num)
{
	  print "<select name='type_$num'>";
	  print "<option value=''>SELECT TYPE</option>";     // first option is NULL option
	  $qry = "SELECT type_id, name FROM types ORDER BY name";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on type dropdown: ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row['type_id'];
             $name = $row['name'];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	

}

//---------------------------EXECUTION STARTS HERE  ------------------------------

// Add a new pokemon to the database. Use lookup tables for the some of the fields. 
// print_r ($_POST);

if (isset($_POST['add_new_pokemon'])) {      // /user hit submit
   // check the NOT NULL columns to be sure they have a value. 
   if (empty($_POST['dex_number']) || 
       !isset($_POST['type_1']) || 
	   !isset($_POST['ability_1']) || 
	   empty($_POST['name']))
	        print "Please fill out all the required fields marked with *<br>";
	else {
	    // the next 4 post vars are NOT NULL so they should have a value
	    $name=$_POST['name'];
		$dex_number = $_POST['dex_number'];
        $type_1 = $_POST['type_1'];
	    $ability_1 = $_POST['ability_1']; 
		// For columns that allow null we need to force the empty post values to be null
		$ability_2 = !empty($_POST['ability_2']) ? $_POST['ability_2'] : 'NULL';
		$type_2 =    !empty($_POST['type_2']) ? $_POST['type_2'] : 'NULL';
		$sprite =    'NULL';   // not currently using this column
		$evolve =    !empty($_POST['evolve']) ? $_POST['evolve'] : 'NULL';
	 
        $query = 
		"INSERT INTO pokemon(dex_number, evolve, type_one, type_two, name, ability_one, ability_two) VALUES
		('$dex_number'," . $evolve . 
		 ", '$type_1', " . $type_2  . 
		 ", '$name', '$ability_1', " . $ability_2 . ")";
         
         $result = mysqli_query ($db, $query);
         if (!$result) 
             print "ERROR: Add New Pokemon Failed on INSERT " . mysqli_error($db);
         else {
             print "<br>New Pokemon Added <br>";
			/*print "<form>";
             print "<button type='button' onclick=\"window.location='add_new_pokemon.php';\">Add Another Pokemon</button>";
             print "<button type='button' onclick=\"window.location='pokemon.php';\">Display Pokedex</button><br>";
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
<h2> Enter New Pokemon</h2>
<p> * required field</p>
<form method = 'post' >
<table class="data-input">
<tr>
   <td>Dex Number:</td>
   <td><input type='text' name='dex_number'/>*</td>
</tr><tr>
   <td>Name:</td>
   <td><input type='text'  name='name' />*</td>
</tr><tr>
   <td>Evolve:</td>
   <td><?php display_evolves_dropdown($db);?></td>
</tr><tr>
   <td>Ability 1:</td>
   <td><?php display_ability_dropdown($db,1);?>*</td>
</tr><tr>
   <td>Ability 2:</td>
   <td><?php display_ability_dropdown($db,2);?></td>
</tr><tr>
   <td>Type 1:</td>
   <td><?php display_type_dropdown($db,1);?>*</td>
</tr><tr>
	<td>Type 2:</td>
	<td><?php display_type_dropdown($db,2);?></td>
</tr><tr>
	<td>&nbsp;</td>
	<td><input type='submit' name='add_new_pokemon' value='Add New Pokemon'/></td>
</tr>
</table>

</form>
</div>

<?php
}
include "footer.php";
?>