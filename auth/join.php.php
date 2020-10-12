<?php include("admin/inc/db.inc.php");
@include("admin/inc/type.inc.php");
$date = date("d/m/Y");
$siteinfo = mysql_query("SELECT `url`,`site_name` FROM `site_info`");
$aemail = mysql_fetch_array(mysql_query("select email from admin where ID='1'"));
$get = mysql_fetch_array($siteinfo);
?>
<title><?php print("$get[site_name]"); ?></title>
<div align="center">
  <p><font size="7" face="Tahoma"><b><i>Join</i></b></font></p>
  <p>&nbsp;</p>
</div>
<center>

<form name='form1' method='post' action='join.php?join=1'>
  <table width='262' border='0' cellpadding='0' cellspacing='0'>
    <tr> 
      <td width='132' height='28' valign='middle'> 
        <div align='right'><font size='2'><b><font face='Tahoma'> Username:</font></b></font></div>
      </td>
      <td width='130' valign='top'> 
        <input type='text' name='username'>
      </td>
    </tr>
    <tr> 
      <td valign='middle' height='28'> 
        <div align='right'><font face='Tahoma' size='2'><b> Password:</b></font></div>
      </td>
      <td valign='middle'><font size="2" face="Tahoma" color="#FF0000"> Will be 
        sent in a email
        <input type="hidden" name="join">
        </font></td>
    </tr>
    <tr> 
      <td valign='middle' height='28'> 
        <div align='right'><b><font size='2' face='Tahoma'> Email:</font></b></div>
      </td>
      <td valign='top'> 
        <input type='text' name='email'>
      </td>
    </tr>
    <tr> 
      <td height="23" valign="middle"> 
        <div align="right"><b><font size="2" face="Tahoma">Join Mailing List?</font></b></div>
      </td>
      <td valign="top"> 
        <input type="radio" name="mailing" value="1">
        <font size="2" face="Tahoma"><b>Yes</b></font><br>
        <input type="radio" name="mailing" value="0">
        <b><font size="2" face="Tahoma">No</font> </b></td>
    </tr>
  </table>
  <input type='submit' value=' OK! ' name='submit'>
</form>
<?php 
if(IsSet($join))
{
$_post['email'];
$_post['mailing'];
$_post['username'];
function random_char($string)
{
$length = strlen($string);
$position = mt_rand(0, $length - 1);
return($string[$position]);
}
function random_string ($charset_string, $length)
{
$return_string = random_char($charset_string);
for ($x = 1; $x < $length; $x++)
$return_string .= random_char($charset_string);
return($return_string);
} 
mt_srand((double)microtime() * 1000000);
$charset = "abcdefghijklmnopqrstuvwxyz1234567890ABCDE_FGHIJKLMNOPQRSTWXYZ";
$charset1 = "abcdefghijklmnopqrstuvwxyz1234567890ABCDE_FGHIJKLMNOPQRSTWXYZ";
$password = random_string($charset, 6);
$login_code = random_string($charset1, 6);
$Epassword = MD5($password);
if(Empty($username))
{
print("Please Fill in all the fields<br>");
exit;
}
if(Empty($email))
{
print("Please Fill in all the fields<br>");
exit;
}
else
{
$check = mysql_query("SELECT `username` FROM `users` WHERE 1 AND `username` LIKE '$username'");
$records = mysql_num_rows($check);
if($records > 0)
{
print("$username is already in use, please choose a differnet username...");
}
else
{
$query1 = "INSERT INTO `users` (`username`, `password`, `email`, `mailing_list`, `date`, `last_login`, `pass`, `login_code`) VALUES ('$username', '$Epassword', '$email', '$mailing', '$date', '00/00/00', '$password', '$login_code')";
$in = mysql_query($query1) or die ("Unable to Insert new Member...plase contact the webmaster...");
print("Welcome to $get[site_name], Please check your email inbox for your password and other information.<br><center><br><a href=\"http://www.qadsscripts.t2u.com\"><font size=\"2\">Script From QadsScripts</font></a>");
$body = "
Welcome to $get[site_name],
Here is your account information at $get[site_name]:

Username: $username
Password: $password

To login please go to: $get[url]

**********Please Note***************
This is not spam mail, some one asked us to send this information to this email address.
**********Thank You************
*******Script From Qadsscripts.t2u.com*********";

mail("$email","$get[site_name] - Welcome","$body","From:$aemail[email]");
}
}
}
?>