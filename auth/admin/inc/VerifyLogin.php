<?php
session_start();
$admin_name1 = $_SESSION['username']; 	
include("inc/type.inc.php");
if(empty($admin_name1)) 
{
echo " admin name is $admin_name1<Br>";
die('An error has ocurred. It may be that you have not logged in, or that your session has expired.
Please try <a href="login.php">logging in</a> again...');
}

?>
