
<?php
require("includes/config.php");

require("includes/connect.php");
include "dirtbikeHeader.php";


$validation="failed";
$firstname=""; $lastname=""; $street=""; $city=""; $zip=""; $email=""; $dob ="";  $membership=""; $password1=""; $password2=""; $username="";
$errors = array();
if (isset ($_POST['submits']))
{
	
if(!empty($_POST['firstname'])) { // Did the user enter data into the text box?
 $firstname = $_POST['firstname']; // Assign the data to a shortname variable
 if (strlen(trim($firstname)) == 0) // Is the text entered just whitespace?
$errors['firstname'] = "First name cannot be blank.<br>";}
else { //text box was empty
$errors['firstname'] = "This field is required<br>";
}

if(!empty($_POST['lastname'])) { // Did the user enter data into the text box?
 $lastname = $_POST['lastname']; // Assign the data to a shortname variable
 if (strlen(trim($lastname)) == 0) // Is the text entered just whitespace?
$errors['lastname'] = "cannot be blank.<br>";}
else { //text box was empty
$errors['lastname'] = "This field is required<br>";
}

if(!empty($_POST['street'])) { // Did the user enter data into the text box?
 $street = $_POST['street']; // Assign the data to a shortname variable
 if (strlen(trim($street)) == 0) // Is the text entered just whitespace?
$errors['street'] = "cannot be blank.<br>";}
else { //text box was empty
$errors['street'] = "This field is required<br>";
}

if(!empty($_POST['city'])) { // Did the user enter data into the text box?
 $city = $_POST['city']; // Assign the data to a shortname variable
 if (strlen(trim($city)) == 0) // Is the text entered just whitespace?
$errors['city'] = "cannot be blank.<br>";}
else { //text box was empty
$errors['city'] = "This field is required<br>";
}

if(!empty($_POST['zip'])) { // Did the user enter data into the text box?
 $zip = $_POST['zip']; // Assign the data to a shortname variable
 if (!preg_match ("/^([0-9]{5})$/i", $zip))
	 $errors['zip'] = "Enter a valid zip code";
 if (strlen(trim($zip)) == 0) // Is the text entered just whitespace?
$errors['zip'] = "cannot be blank.<br>";}
else { //text box was empty
$errors['zip'] = "This field is required<br>";
}

	
	if (!empty($_POST['email'])) {
$email = $_POST['email'];}
if (strlen(trim($email)) == 0) // Is the text entered just whitespace?
$errors['email'] = "email cannot be blank<br>";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error['email']= "Invalid email address.<br>";
}

if (!empty($_POST['dob'])){
$dob = $_POST['dob'];
list($y, $m, $d)=explode('-', $dob);
if(!checkdate($m, $d, $y)){
 $errors['dob'] = "Date entered is not valid<br>";
}
}
else { //text box was empty
$errors['dob'] = "Not valid";
}

if (!isset($_POST['membership'])) // notice we used isset
 $errors['membership'] = "Please select";
else {
 $membership = $_POST['membership'];
}

if(!empty($_POST['username'])) { // Did the user enter data into the text box?
 $username = $_POST['username']; // Assign the data to a shortname variable
 if (strlen(trim($username)) == 0) // Is the text entered just whitespace?
$errors['username'] = "Username cannot be blank.<br>";}
else { //text box was empty
$errors['username'] = "This field is required<br>";
}
	

    if (!empty($_POST['password1'])) {
	$password1=$_POST['password1'];}	
	
	    if (!preg_match ("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password1))
 $errors['password1'] = "Password must contain at least 8
characters and include 1 lower case, 1 upper case, 1
number, and 1 special character";

    if (!empty($_POST['password2'])){
		$password2=$_POST['password2'];
		if(!($_POST["password2"] == $_POST["password1"])) {
		$errors['password2'] = "Passwords must match";
		}
	}                        
	else{
		$errors['password2'] = "enter your pasword again to confirm";
	}	  
	  
	  
    $errorCount = count($errors);
if ($errorCount == 0) { // No errors on form, YEAH!
 $validation = "Success";
}
else {
 print "<small id='errorText'>There are $errorCount errors. Please
make corrections and try again</small>";
}


//--------------------------------------------form filledout, query to databases below
    if ($validation == "Success") {
print "<p>You entered the name $firstname</p>";
print "<p>You entered the email $email</p>";
print "<p>You entered the date $dob</p>";
print "<p>You entered the membership $membership</p>";
print "<p>You entered the username of $username</p>";


$query =  "SELECT username, password FROM members WHERE username = '$username' ";  
		
		$result =  mysqli_query ($db, $query);
			if (!$result) {
			echo mysqli_error($db);
			}	
		$numRows = mysqli_num_rows($result);
		if($numRows > 0)
		{
			$errors['username'] = "username already exists.";
		}
		else { // User name is available and we can enter this new user into the database. 
		   $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
		   $query= "INSERT INTO members (member_name_first, member_name_last, street, city, zip, email, dob, membership_color,  password, username )
					VALUES ('$firstname', '$lastname', '$street','$city','$zip','$email','$dob','$membership','$hashed_password','$username' )"; 
		  
		   // CREATE A STRING THAT CONTAINS A SQL INSERT COMMAND. (see slide 14 in Lab7_Essential_Skills.pdf)
				   // IT SHOULD INSERT THE USERNAME, HASHED PASSWORD, AND EMAIL FOR THE NEW USER. 
				   // REMEMBER THAT YOU MUST PUT ALL SQL STRING DATA BETWEEN SINGLE QUOTES.... 
				   // EVEN IF IT'S A VARIABLE, E.G. '$username'
				   // REMEMBER TO PUT THE ENTIRE QUERY STRING IN DOUBLE QUOTES. 
		   $result =  mysqli_query ($db, $query);
		   if (!$result)
				echo "INSERT error:" . mysqli_error($db);
		
		   // IF WE GET HERE, THE USER IS SUCCUSSFULLY REGISTERED. GO TO PHPMYADMIN AND LOOK FOR THE USER IN THE LABS DATABASE AND THE USERS TABLE!!!
		   // WE PRINT THIS MESSAGE, BECAUSE AFTER REGISTERING, THE USER MUST LOGIN. THIS IS STANDARD OPERATING PROCEDURE. 
		   echo "<p>Thank you for registering. Please <a href=\"logon.php?username=$username\"> login.</a></p>";

		}
	}
}
	?>
  
	
	<header id="tagline">
	<h1> Join Now! <br> Pro Club</h1><br><h2>Register<h2>
	</header>

<div class="row">

  
  
<!--middle------------------------------------->
  <div class="col-md-6" id="tagline">
  <br><br>
  
  <form method="post" action="" id="contact">
  First Name <input type='text' name='firstname' value="<?php
	echo isset($_POST['firstname']) ?
	$_POST['firstname'] : ""; ?>" />
	<small id="errorText">
	<?php echo array_key_exists('firstname', $errors) ? "<br>" . $errors['firstname'] : ""; ?>
	</small id="errorText">
	
  <br><br>
  Last Name <input type='text' name='lastname' value="<?php
	echo isset($_POST['lastname']) ?
	$_POST['lastname'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('lastname', $errors) ? "<br>" . $errors['lastname'] : ""; ?>
	</small class="errorText">
	
  <br><br>
  Street <input type='text' name='street' value="<?php
	echo isset($_POST['street']) ?
	$_POST['street'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('street', $errors) ? "<br>" . $errors['street'] : ""; ?>
	</small>
	
  <br><br>
  City <input type='text' name='city' value="<?php
	echo isset($_POST['city']) ?
	$_POST['city'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('city', $errors) ? "<br>" . $errors['city'] : ""; ?>
	</small>
	
  <br><br>
  zip <input type='text' name='zip' value="<?php
	echo isset($_POST['zip']) ?
	$_POST['zip'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('zip', $errors) ? "<br>" . $errors['zip'] : ""; ?>
	</small>
	
  <br><br>
  Email: <input type="email" name="email" value="<?php
	echo isset($_POST['email']) ?
	$_POST['email'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('email', $errors) ? "<br>" . $errors['email'] : ""; ?>
	</small>
	
  <br><br>
  Date of birth: <input type="date" name="dob" value="<?php
	echo isset($_POST['dob']) ?
	$_POST['dob'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('dob', $errors) ? "<br>" . $errors['dob'] : ""; ?>
	</small>
  

  </div>
  <!--right--------------------------------------->
	<div class="col-md-6" id="tagline">
	<br><br>
  Which membership will you be acquiring?
  <input type="radio" name="membership"  <?php if(isset($_POST["membership"]) &&
	$_POST["membership"] == "Pro Membership")
	echo "checked='checked'"; echo isset($_POST['membership']) ?
	$_POST['membership'] : "";?> 
	value ="Pro membership"/> Pro Membership 
	
	
  <input type="radio" name="membership"  <?php if(isset($_POST["membership"]) &&
	$_POST["membership"] == "Basic Membership")
	echo "checked='checked'"; echo isset($_POST['membership']) ?
	$_POST['membership'] : "";?> 
	value ="Basic membership"/> Basic Membership 
	<small class="errorText">
	<?php echo array_key_exists('membership', $errors) ? "<br>" . $errors['membership'] : ""; ?>
	</small>
  
  
  <br><br>
  	Username: <input type='text' name='username' value="<?php echo isset($_POST['username']) 
	? $_POST['username'] : ""; ?>" />
	<small class="errorText">
	<?php echo array_key_exists('username', $errors) ? "<br>" . $errors['username'] : ""; ?>
	</small>
	
	<br><br>
  password <input type="password" name="password1" required='required'/>
  
  <br><br>
	password confirmation <input type="password" name="password2" required='required'/>
	<small class="errorText">
	<?php echo array_key_exists('password1', $errors) ? "<br>" . $errors['password1'] : ""; ?>
	</small>
	<small class="errorText">
	<?php echo array_key_exists('password2', $errors) ? "<br>" . $errors['password2'] : ""; ?>
	</small>
	
	<br><br>
  <input type="submit" name="submits" value="Join Pro Club!">
  </div>
  
	</div>

	<?PHP include"dirtbikeFooter.php" ?>
