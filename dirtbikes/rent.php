<?PHP
include "dirtbikeHeader.php";
session_start();
include "authenticate.php";

if(!isLoggedIn())
{
	print "You are not logged in!"; 
	print "<br/>"; 
	print "You must log in to view database content.";
	print "<br/>";
	print "Please use the link below to log in.";
	print "<br/>"; ?>
	
	
	
	<br/>
	
	<a href="logon.php">Back to Login Page</a>

		
<?php	
}
else
{  
include "rentFunctions.php";

if (isset($_POST['view_rental'])){
	$query8 ="SELECT rental_start_date, rental_return_date FROM rentals ";  
	$result8 =  mysqli_query ($db, $query8);
	if (!$result8) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result8);

print "<table border=1 class=table>";
 
 print "<tr><th> Start Date </th><th> Return Date</th></tr>";

for ($i=0; $i<$numRows; $i++) {
   $row = mysqli_fetch_assoc($result8);
   print "<tr>";   
   foreach ($row as $key=>$value) {
		    print "<td>$value";
			print "</td>";
   }  
   print "</tr>";
}
print "</table>";
print "<p>return <a href='rent.php'> to rents </p>";
}



else{

?>
	
<style>
.table{
	margin-left: 10px;
}
</style>
	
	<header id="tagline">
	<h1> Choose the Best Gear <br>For Rent</h1>
	</header>

<div class="row">
<!----------left--->
  <div class="col-md-5" id="tagline">
  <h2>DIRTBIKES FOR RENT</H2>
  <?PHP
  
  	$query3 ="SELECT dirtbike_make, dirtbike_motor_size, dirtbike_year, price FROM dirtbike_rentals ";  
	$result =  mysqli_query ($db, $query3);
	if (!$result) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result);

print "<table border=1 class=table>";
 
 print "<tr><th> Dirtbike make</th><th> motor size </th><th> year </th><th> price </th></tr>";

for ($i=0; $i<$numRows; $i++) {
   $row = mysqli_fetch_assoc($result);
   print "<tr>";   
   foreach ($row as $key=>$value) {
		    print "<td>$value";
			print "</td>";
   }  
   print "</tr>";
}
print "</table>";

  
  
  
  
  
  ?>
  </div>
  
  
<!--middle------------------------------------->
  <div class="col-md-3" id="tagline">
  <br><br>
  <form action="" method="post">

  <table>
  

  <tr>
  <td>Choose User</td>
   <td><?php display_dropdown ($db,'member_id' , 'member_id' , 'concat(member_name_first," ",member_name_last)' , 'members') ?>*</td>   
   </tr>
   <td>choose bike</td>
   <td><?php display_dropdown ($db,'Dirtbike make' , 'dirtbike_id' , 'dirtbike_make' , 'dirtbike_rentals') ?>*</td>   
</tr><tr>
   <td>enter start date:</td>
   <td><input type='date'  name='date1' /></td>
</tr><tr>
   <td>enter return date:</td>
   <td><input type='date'  name='date2' /></td>
</tr><tr>
   <td>choose track location</td>
     <td><?php display_dropdown ($db,'location' , 'location_id' , 'location_name' , 'location') ?>*</td>
</tr><tr>
		<td>choose track</td>
		 <td><?php display_dropdown ($db,'track' , 'location_id' , 'track_name' , 'tracks') ?>*</td>
	</tr><tr>
	
	<td><input type='submit' name='add_event' value='Add Rental'/></td>
	<td><input type='submit' name='view_rental' value='View my rental'/></td>
</tr>
  </table>
  <input type="hidden" name="rental_id" value="<?PHP echo isset($rental_id)? $rental_id : 0 ?>"/>
	</form>
	
	
</div>

<!-------------right------>
<div class="col-md-4" id="tagline">
<h2>TRACKS AVAILABLE</h2>
<?PHP

	$query3 ="SELECT track_name, track_skill_level, track_type, track_length, price FROM tracks ";  
	$result =  mysqli_query ($db, $query3);
	if (!$result) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result);

print "<table border=1>";
 
 print "<tr><th> name </th><th> skill level </th><th> Track type </th><th> length </th><th> price </th></tr>";

for ($i=0; $i<$numRows; $i++) {
   $row = mysqli_fetch_assoc($result);
   print "<tr>";   
   foreach ($row as $key=>$value) {
		    print "<td>$value";
			print "</td>";
   }  
   print "</tr>";
}
print "</table>";

?>
  </div>


</div>
<?PHP include"dirtbikeFooter.php" ?>
<?PHP
}
}
?>  

