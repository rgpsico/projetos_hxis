<?php
include("inc/VerifyLogin.php");
include("inc/db.inc.php");
function tot_users()
{
$tot = mysql_query("SELECT * FROM users");
$totusers = mysql_num_rows($tot);
print("Total Users: $totusers");
}
if($page == $page)
{
//users online script
$timeoutseconds = 30; 
$timestamp = time(); 
$timeout = $timestamp-$timeoutseconds; 
$insert = mysql_query("INSERT INTO usersonline VALUES ('$timestamp','$REMOTE_ADDR','$page')"); 
if(!($insert)) { 
 print "Useronline Insert Failed > "; 
} 
$delete = mysql_query("DELETE FROM usersonline WHERE timestamp<$timeout"); 
if(!($delete)) { 
 print "Useronline Delete Failed > ";
} 
$result = mysql_query("SELECT DISTINCT ip FROM usersonline"); 
if(!($result)) { 
 print "Useronline Select Error > "; 
} 
$user = mysql_num_rows($result); 
if($user == 1) { 
 $online = "$user User Online \n";
} else { 
 $online = "Users Online: $user\n"; 
}
}

require_once("inc/top.inc.php");
include("inc/functions.php");
require_once("inc/bottem.inc.php");
?>
