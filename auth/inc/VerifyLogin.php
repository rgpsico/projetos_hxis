<?php
session_start();
include("admin/inc/type.inc.php");
$username = $_SESSION["username"];	
if(empty($username)) {
		die('An error has ocurred. It may be that you have not logged in, or that your session has expired.
			Please try <a href="login.php">logging in</a> again...');
	}
?>
