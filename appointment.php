<!doctype html>
<html>
<head>
<meta charset="utf-8">
//charles wilson
<title>Quiz 1</title>
<link href="quiz1.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
<h2>Appointment Request</h2>
</header>

<div id='apt'>

<?php
// INSERT YOUR PHP PROCESSING AND HTML FORM HERE. 
$fullName=""; $patient=""; $day=""; $time=""; 

if (isset ($_POST['submit'])){
$fullName = $_POST['fullName'];
$patient = $_POST['patient'];
$day = $_POST['days'];
$time = $_POST['time'];
$allSet ="yes";
}
if ($allSet = "yes"){
print "<p> $fullName </p>";
print "<p> $patient </p>";
print "<p> $day $time </p>";
}
?>
<form method='post' action="" >
	Name: <input type='text' name='fullName'><br><br>
	Patient type:
	<input type='radio' name='patient'
	value='new' > new 
	<input type='radio' name='patient'
	value='current' > current 
	<input type='radio' name='patient'
	value='returning' > returning <br><br>
	
	Days available: <br><br>
	<input type='checkbox' name='days'
	value='monday' >Monday
	<input type='checkbox' name='days'
	value='tuesday' >Tuesday
	<input type='checkbox' name='days'
	value='wednesday' >Wednesday
	<input type='checkbox' name='days'
	value='thursday' >Thursday
	<input type='checkbox' name='days'
	value='friday' >Friday<br><br>
	
	Estimate how often you watch movies<br><br>
	<select name='time'>
	<option value ='morning'>morning</option>
	<option value='afternoon'>afternoon</option>
	<option value='evening'>evening</option>
	</select>
	<br><br>
	<input type='submit' name='submit' value='Submit Request' >

</form>

</div>
</body> </html>