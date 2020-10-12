<?php
@include("admin/inc/type.inc.php");
if(IsSet($change))
{
include("admin/inc/db.inc.php");
$type = $_POST['type'];
if($type == 'username')
{
$username = $_POST['username'];
$type1= $username;
}
else
{
$email = $_POST['email'];
$type= "email";
$type1= $email;
}

$admin = mysql_fetch_array(mysql_query("SELECT email FROM admin WHERE ID='1'"));
$site = mysql_fetch_array(mysql_query("SELECT site_name,url FROM site_info WHERE ID='1'"));
$query = mysql_query("select username, email, pass, login_code from users where $type='$type1' limit 1");

$count = mysql_num_rows($query);
if($count == 1)
{
$userinfo = mysql_fetch_array($query);
$msg = "Hi
Someone has asked us to send your account information at this email address:

Username: $userinfo[username]
password: $userinfo[pass]
Login Code: $userinfo[login_code]

to login, please go to $site[url]
If you did't ask for this information then please ignore this email.

***script downloaded from www.qadsscripts.t2u.com***";
$mail = mail("$userinfo[email]", "Your Account Info-$site[site_name]","$msg", "From: $admin[email]"); 
$email = str_replace("@","[at]",$userinfo[email]);
$where = strpos("$userinfo[email]","@");
$email = substr("$userinfo[email]", 0,$where);
print("Your Account information has been sent to <i>$email@</i>...");
}
else
{
$error = 1;
}

if($error == 1)
{
print("<p><font face=\"Tahoma\" size=\"2\"><b>Error:</b><br>Couldn't find your account, please
check the list below:</font></p>
<ul>
  <li><font face=\"Tahoma\" size=\"2\">You didn't fill in all fields.</font></li>
  <li><font face=\"Tahoma\" size=\"2\">You typed a wrong username/email address.</font></li>
</ul>
<p><font face=\"Tahoma\" size=\"2\">If you did the above and still got this message
then please try again....</font></p>
<p align=\"center\">&nbsp;</p>
<p align=\"center\"><font size=\"2\" face=\"Tahoma\">Script downloaded from <a href=\"http:/www.qadsscripts.t2u.com\">Qads
Scripts</a></font></p>
<p align=\"left\"><i><font size=\"2\" face=\"Tahoma\">Use 'Back' Button to try </font><font size=\"2\" face=\"Tahoma\">again</font></i></p>");
}
}
else
{
print("Not allowed to view this file directly...");
}
?>