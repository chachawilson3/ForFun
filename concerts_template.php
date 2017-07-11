<?php 
include "Lab10_header.php";
include "includes/config.php";
include "includes/connect.php";
?>

<div id="wrapper">

<?PHP
	
	/**$query1 = "SELECT featured_band, concert_date, concert_time, venue, ticket_info FROM concerts ORDER BY concert_date ";  
	$result =  mysqli_query ($db, $query1);
	if (!$result) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result);**/
	
	/**$query2 ="SELECT featured_band, concert_date, concert_time, venue, ticket_info FROM concerts WHERE venue = 'The Bell Centre' ORDER BY concert_date ";  
	$result =  mysqli_query ($db, $query2);
	if (!$result) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result); **/
   
	$query3 ="SELECT featured_band, concert_date, concert_time, venue, ticket_info FROM concerts WHERE featured_band LIKE '%Band%' ORDER BY concert_date ";  
	$result =  mysqli_query ($db, $query3);
	if (!$result) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result);
  
 // INSERT all the code here to read and print the concert data. 
 
 
print "<table class = 'data'>";

print "<tr><th>Band</th><th>Date</th><th>Time</th><th>venue</th><th>tickets</th></tr>";

for ($i=0; $i<$numRows; $i++) {
   $row = mysqli_fetch_assoc($result);
   print "<tr>";   
   foreach ($row as $key=>$value) {
       print "<td>$value</td>";
   }  
   print "</tr>";
}


print "</table>";
  
 
?>	


 

</div>

</body>
</html>
	