<?php
include "header.php";
require("includes/config.php");
require("includes/connect.php");


// Set these values equal to empty string in case form user replies 0 
// for number of attendees and therefore is not bringing any food or other items.


print "<div id='left_col'>";



	 	 
	 
if (isset($_POST['submit_rsvp'])){
	
	
	
	if($_POST['attending']=="0"){
		$name = addslashes($_POST['name']);
		$attending = "0";
		$category ="";
		$description ="";
		$t1="";
	}
	else{
	
	$name = addslashes($_POST['name']);
	$attending = $_POST['attending'];
	$category = $_POST['category'];
	$description = addslashes($_POST['description']);
	 if(isset($_POST['bring'])){
    $t1=implode(',', $_POST['bring']);
	 }
	
	}
	
 $query= "INSERT INTO replies (Name, Attendees, Category, Food, Items)
		VALUES ('$name', '$attending', '$category', '$description','$t1')"; 

	 $result =  mysqli_query ($db, $query);
		   if (!$result)
				echo "INSERT error:" . mysqli_error($db);
			if($result){
                    echo "insert success";
                }else{
                    echo "error in inserting";
                }
	}


	if (isset($_POST['view_replies'])){
	$query2 ="SELECT ID, Name, Category, Food, Items FROM replies ";  
	$result2 =  mysqli_query ($db, $query2);
	if (!$result2) {
	echo mysqli_error($db);
	}	
	$numRows = mysqli_num_rows($result2);

print "<table border=1 class=table>";
 
 print "<tr><th>ID</th><th> Name </th><th> Category </th><th> Food </th><<th> Items </th>/tr>";

for ($i=0; $i<$numRows; $i++) {
   $row = mysqli_fetch_assoc($result2);
   print "<tr>";   
   foreach ($row as $key=>$value) {
		    print "<td>$value";
			print "</td>";
   }  
   print "</tr>";
}
print "</table>";
print "<p>return <a href='barbecue.php'> home </p>";
}
	
	else{
	
mysqli_close($db);

?>


<form action="" method="post">
	
Name:<br> <input type='text' name='name' required='required'/><br><br>

How many people attending?: <input type='text' name='attending' required='required'/>
<br><br>
<p>Food category?</p>
<input type="radio" name="category" value="drink"/>Drinks
<input type="radio" name="category" value="meat"/>Grilling meats
<input type="radio" name="category" value="salad"/>Salad
<input type="radio" name="category" value="desert"/>Desert
<br><br>
Food name/description: <br>
<input type='text' name='description'/>
<br><br>
I can also bring:<br>
<input type='checkbox' name='bring[]' value="folding chairs"/>Folding chairs<br>
<input type='checkbox' name='bring[]' value="grill"/>Grill<br>
<input type='checkbox' name='bring[]' value="table"/>Table<br>
<input type='checkbox' name='bring[]' value="paper products"/>Paper products<br>
<br>

<input type="submit" name="submit_rsvp" value="Submit rsvp">
<input type="submit" name="view_replies" value="View replies" formnovalidate>
</form>
</div>
</div>
 
</body>

</html>
<?PHP } ?>














