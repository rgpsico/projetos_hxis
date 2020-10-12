<p align="center"><b><font size="4" face="Tahoma"><u>Unsubscribe</u></font></b><p>
<?php
include("admin/inc/type.inc.php");
if(IsSet($username))
{
if($username && $password > Null)
{
include("admin/inc/db.inc.php");
$password = MD5($password);
$count = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE 1 AND `username` = '$username' AND `password` = '$password' LIMIT 0, 1"));
if($count == 1)
{
$update= mysql_query("update users set mailing_list='$set' where username='$username' AND password='$password' limit 1");
print("<center><b><p>You Account Settings have been saved...</center></b></p>");
}
else
{
print("<center><b><p>User not found, Please try agian with correct username and password...</center></b></p>");
}
}
else
{
print("<center><b><p>Please fill all * fields...</center></b></p>");
}
}
?>

<font size="2" face="Tahoma">This will not delete your account, it will only unsubscribe you from our mailing list.</font>

<form method="POST" action="remove.php">

  <table border="0" width="100%" cellspacing>
    <tr>
      <td width="50%" align="right"><b><font size="2" face="Tahoma">*Username:</font></b></td>
      <td width="50%"><input type="text" name="username" size="16"></td>
    </tr>
    <tr>
      <td width="50%" align="right"><b><font size="2" face="Tahoma">*Password:</font></b></td>
      <td width="50%"><input type="password" name="password" size="16"></td>
    </tr>
    <tr>
      <td width="50%" align="right" valign="top"><b><font size="2" face="Tahoma">Do you want
        to:</font></b></td>
      <td width="50%"><font size="2" face="Tahoma"><b><input type="radio" name="set" value="0">unsubscribe<br><input type="radio" value="1" checked name="set">subscribe</b></font></td>
    </tr>
    <tr>
      <td width="50%" align="right"></td>
      <td width="50%"><input type="submit" value="unsubscribe" name="B1"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>

<p align="center"><font size="1" face="Tahoma">Script from <a href="http://www.qadsscripts.t2u.com" target="_blank">Qads
Scripts</a></font></p>
