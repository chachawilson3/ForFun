<?PHP
//open database
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno())
{
die( "Connection failed: " . mysqli_connect_error());
}
?>