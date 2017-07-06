<?php

function isLoggedIn()
{
if(isset($_SESSION['user_name']))
 return TRUE;
 else
 return FALSE;
}
?>