<?php
include "dirtbikeHeader.php";
session_start();
if (isset($_SESSION['user_name'])) {
 unset($_SESSION['user_name']); // clear the session variable
}
print "<p>You are currently logged out. Please use this link to</p>.<p><a href='logon.php'>Login</a> </p>";

?>