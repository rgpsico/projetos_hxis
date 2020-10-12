<?php
include("inc/VerifyLogin.php");
$current = $_POST['c_pass'];
$new = $_POST['n_pass'];

if(IsSet($change))
{
include("admin/inc/db.inc.php");
if($new && $current > Null)
{
$current = md5($current);
$sql = mysql_query("SELECT * FROM `users` WHERE 1 AND `username` = '$username' AND `password` = '$current' LIMIT 1"); 
$sl = mysql_num_rows($sql);
if($sl == 1)
{
$new1 = md5($new);
$update = mysql_query("update users set password='$new1', pass='$new' where username='$username' limit 1");
//session_destroy();
print("Your password has been changed, You will need to <a href='login.php'>Login</a> agian...");
}
else
{
print("<p><font face=\"Tahoma\" size=\"2\"><b>Error:</b><br>Couldn't modify your password, please
check the list below:</font></p>
<ul>
  <li><font face=\"Tahoma\" size=\"2\">You didn't fill in all fields.</font></li>
  <li><font face=\"Tahoma\" size=\"2\">You typed a wrong password.</font></li>
</ul>
<p><font face=\"Tahoma\" size=\"2\">If you did the above and still got this message
then <a href=\"logout.php\">logout</a> and login back in, then try again....</font></p>
<p align=\"center\">&nbsp;</p>
<p align=\"center\"><font size=\"2\" face=\"Tahoma\">Script downloaded from <a href=\"http://www.qadsscripts.t2u.com\">Qads
Scripts</a></font></p><i>use 'Back' button to try agian...
");
}
}
}
?>