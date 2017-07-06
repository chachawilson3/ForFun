<?php

$validInputs = false; 
$username=""; $email=""; $password1=""; $password2=""; 
$errors = array();

if (isset ($_POST['submit']))
{
	
if(!empty($_POST['username'])) { // Did the user enter data into the text box?
 $username = $_POST['username']; // Assign the data to a shortname variable
 if (strlen(trim($username)) == 0) // Is the text entered just whitespace?
$errors['username'] = "Username cannot be blank.<br>";}
else { //text box was empty
$errors['username'] = "This field is required<br>";
}
	
	// 2. Validate email. Make sure you use !empty() to make sure $_POST contains a value. 
	// Then assign a shortname. Use filter_var() to check the $email just like lab 4. 
	
if (!empty($_POST['email'])) {
$email = $_POST['email'];}
if (strlen(trim($email)) == 0) // Is the text entered just whitespace?
$errors['email'] = "email cannot be blank<br>";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error['email']= "Invalid email address.<br>";
}
	

	// 3. Validate password1. Make sure you use !empty() to verify that password 1 contains data
	// Assign $_POST variable to a short names: 	$password1 = ... ;   
	// use the regular expression from slide 29 of 04_Validation_Functions.pdf to validate password1. 
	// if password does not match the pattern in the regular expression, save an error message in $errors['password1']
	// else : password1 field is empty. This also triggers an error message. It can be saved as $errors['password1']
    if (!empty($_POST['password1'])) {
	$password1=$_POST['password1'];}	
		
		
	                        // check password 1
   
    if (!preg_match ("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password1))
 $errors['password1'] = "Password must contain at least 8
characters and include 1 lower case, 1 upper case, 1
number, and 1 special character";

   
   
    // 4. Validate password 2. Make sure you use !empty() to verify that password2 contains data. 
	// Assign $_POST variable to a short names: 	$password2 = ... ;  
	// Check whether password1 and password2 are equal. If not save an error message in $errors['password2']
	// else: password2 field is empty. This also triggers an error message. It can be saved as $errors['password2']
    if (!empty($_POST['password2'])){
		$password2=$_POST['password2'];
		if(!($_POST["password2"] == $_POST["password1"])) {
		$errors['password2'] = "Passwords must match";
		}
	}                        
	else{
		$errors['password2'] = "enter your pasword again to confirm";
	}	  
	  
	  



    // AFTER ALL FIEDS ARE VALIDATED... check the error count. 	
	$errorCount = count($errors);	
	if ($errorCount > 0) {             // No errors on form, we can just echo output
		print "<small class='errorText'>There are errors. Please make corrections and try again</small>";
		$validInputs = false;
	}
	else {  // There are no errors with inputs, now we must check to see if the username is available. 	
	 
		$query =  "SELECT username, password FROM users WHERE username = '$username' ";  
		
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
		   $query= "INSERT INTO users (username, password, email)
					VALUES ('$username', '$hashed_password', '$email')"; 
		  
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
		   echo "<p>Thank you for registering. Please <a href=\"login.php?username=$username\">login.</a></p>";
		}		   
	}
    
	if (count($errors) == 0)
         $validInputs = true;	
  
}		
if (!$validInputs)  {      // DISPLAY THE REGISTRATION FORM if user inputs are not yet valid. 
?>