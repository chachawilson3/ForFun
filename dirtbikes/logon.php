<?PHP
session_start(); 
include "authenticate.php";        // This contains the function isLoggedIn(). 
// INSERT THE REQUIRE OR INCLUDE STATEMENTS HERE THAT YOU NEED FOR CONNECTING TO THE DATABASE. See register.php for example.
require("includes/config.php");
require("includes/connect.php");
include "dirtbikeHeader.php";
$errors = array();

	if (isset ($_POST['submit']))
	{
	if (!empty($_POST['username'])){ // Did the user enter data into the text box?
		$username = $_POST['username']; // Assign the data to a shortname variable
		}
		else { //text box was empty
		$errors['username'] = "This field is required<br>";
		}
		
	if (!empty($_POST['password1'])) {
	$password1 = $_POST['password1'];
	}
	else { 
	$errors['password1'] = "This field is required<br>";
	}
		
	$query =  "SELECT password, username FROM members WHERE username = '$username' "; 
		
	$result = mysqli_query ($db, $query);// CALL THE MYSQLI() FUNCTION THAT WILL SEND $query TO THE DATABASE. See slide #13 in Lab_7_Essential_Skills.pdf
	if(!$result) {
        $errors['username'] =  "Error in SELECT statement.".mysqli_error($db);
	}
	    else {
		$row = mysqli_fetch_assoc($result);
			if ($row) {
				if (!password_verify($password1, $row['password'])) {
						$_SESSION['user_name'] = $username;
			}
			else{
				$errors['password1']= "Your login credentials could not be verified";
			}
		}    // end of the if ($row) condition.
		else { 
			$errors['password1'] =  "Your login credentials could not be verifie";
		}
	}    // end of the else condition that follows if (!$result)
}
if(isLoggedIn()) {
	$username = $_SESSION['user_name'];
    print "<p>You are currently logged in as: $username</p>";
	print "<br><br><p> <a href=\"home.php?username=$username\"> Home</a></p>";

	// You will also want a link that allows you to logout. Here's the link: 
    print "<p>Use this link to <a href='logout.php'>logout.</p>";  
} 
else {   // user is not logged in, display the login form.

	?>
	
	
	
	
	
	<header id="tagline">

	</header>

<div class="row">

  
  
<!--middle------------------------------------->
  <div class="col-md-12" id="tagline">
  		<form method="post" action="" >
		<h1> Login </h1>
	<br><br>
	Username: <input type='text' name='username'/>
	<small class="errorText">
	<?php echo array_key_exists('username', $errors) ? "<br>" . $errors['username'] : ""; ?>
	</small><br><br>
		
	password <input type="password" name="password1" required='required'/>
	<?php echo array_key_exists('password1', $errors) ? "<br>" . $errors['password1'] : ""; ?>
	</small><br><br>
		 
	<input type="submit" name="submit" value="Login" >	
		</form>
	<br><br>
	
	
	<!-- Then it's nice to provide links to register or logout like this:  -->
    <p>No Login? Click here to <a href='contact.php'>Register.</a></p>
	<p>Finished? Please <a href='logout.php'>Logout</a></p>
	
</div>
</div>


<?PHP include"dirtbikeFooter.php" ?>
<?PHP

// here we just end the else condition with a curly brace that we started before the html. 
}
?>
