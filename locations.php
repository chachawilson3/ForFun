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
	  print "<select name='dex_number'>";
	  
	  $qry = "SELECT dex_number, name FROM pokemon";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on pokemon dropdown: ". mysqli_error ($db));
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

function display_location_dropdown($db)
{
	  print "<select name='location_id'>";
	  
	  $qry = "SELECT location_id, name FROM locations";

	  $result = mysqli_query ($db, $qry); 
	  if (!$result)
	      die ("SELECT error on pokemon dropdown: ". mysqli_error ($db));
	  $numrows = mysqli_num_rows($result);
	
	  
      for ($i=0; $i<$numrows; $i++) {
             $row = mysqli_fetch_assoc($result);
		     $id = $row['location_id'];
             $name = $row['name'];
             print "<option value='$id'>$name</option>";
       }	
       print "</select>";	
}  

?>
<h2>Pokemon Catch Locations</h2>

<?php

if (isset($_POST['show_locations']))
{
    if (!empty($_POST['dex_number']))
	{
	    $dex_number = $_POST['dex_number'];

        $query="SELECT p.dex_number as dex, p.name as pokemon, l.name as location, c.is_unique as is_unique
        FROM pokemon p
        JOIN catch_locations c ON p.dex_number = c.dex_number
        JOIN locations l ON c.location_id = l.location_id
        WHERE c.dex_number = $dex_number";

        $result = mysqli_query ($db,$query);
        if (!$result)
             print "Locations Query Error: " . mysqli_error($db);
        else { 
            
			$numrows = mysqli_num_rows($result);
			if ($numrows == 0)
			    print "This Pokemon can't be caught in the wild.<br>";
			else {
			  print "<table class='data'>";
	          print "<th>Dex</th><th>Pokemon Name</th><th>Location Name</th><th>Is Unique?</th>";
			  for ($i=0; $i<$numrows; $i++) {
				print "<tr>";
				$row = mysqli_fetch_assoc($result);
				print "<td>" . $row['dex'] . "</td>";
			    print "<td>" . $row['pokemon'] . "</td>";
			    print "<td>" . $row['location'] . "</td>";
    			$val = ($row['is_unique']==1) ? 'Yes' : 'No';
				print "<td>$val</td>";
				print "</tr>";
		      }
			}  
		print "</table><br>";
        }
	}
}

if (isset($_POST['show_pokemon']))
{
	    $location_id = $_POST['location_id'];

        $query="SELECT p.dex_number as dex, p.name as pokemon, l.name as location, c.is_unique as is_unique
        FROM pokemon p
        JOIN catch_locations c ON p.dex_number = c.dex_number
        JOIN locations l ON c.location_id = l.location_id
        WHERE l.location_id = $location_id
		ORDER BY p.dex_number";

	    $result = mysqli_query ($db,$query);
        if (!$result)
             print "Locations Query Error: " . mysqli_error($db);
        else { 
            
			$numrows = mysqli_num_rows($result);
			if ($numrows == 0)
			    print "This Pokemon can't be caught in the wild.<br>";
			else {
			  print "<table class='data'>";
	          print "<th>Dex</th><th>Pokemon Name</th><th>Location Name</th><th>Is Unique?</th>";
			  for ($i=0; $i<$numrows; $i++) {
				print "<tr>";
				$row = mysqli_fetch_assoc($result);
				print "<td>" . $row['dex'] . "</td>";
			    print "<td>" . $row['pokemon'] . "</td>";
			    print "<td>" . $row['location'] . "</td>";
    			$val = ($row['is_unique']==1) ? 'Yes' : 'No';
				print "<td>$val</td>";
				print "</tr>";
		      }
			}  
		print "</table><br>";
        }
	}

?>
<form method='POST' >

<table class="data-input">
<tr>
	<td>Select Pokemon: </td>
	<td><?php display_pokemon_dropdown($db,2);?></td>

	<td><input  type='submit' value='Show Locations' name='show_locations'></td>
</tr><tr>

	<td>Select Location: </td>
	<td><?php display_location_dropdown($db,2);?></td>

	<td><input  type='submit' value='Show Pokemon' name='show_pokemon'></td>
</tr>
</table>

</form>
</div>
<?php
include "footer.php";
?>