<?php
include("inc/VerifyLogin.php");
if($page == 'Edit')
{
$sel = mysql_query("SELECT `ID`,`username`,`email`,`date`,`login_code` FROM `users` WHERE ID='$id'");
$get = mysql_fetch_array($sel);

if(IsSet($Esave))
{
if($newpass > NUll)
{
$newpass = MD5($newpass);
$sql = "UPDATE users SET username='$username1', password='$newpass',email='$email', date='$date', login_code='$login_code' WHERE ID='$id1'";
$fin = mysql_query($sql) or die ("Could't update user profile");
}
else
{
$sql = "UPDATE users SET username='$username1', email='$email', date='$date', login_code='$login_code' WHERE ID='$id1'";
$fin = mysql_query($sql) or die ("Could't update user profile");
}
print("New Inforamtion has been Saved");
}
print("<center><form method='POST' action='main.php?page=Edit&&id=$id'>
  <table border='0' width='52%'>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>ID:</font></b></td>
      <td width='48%'><font size='2' face='Tahoma' color='#FF0000'>$get[ID]</font></td>
    </tr>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>Username:</font></b></td>
      <td width='48%'>
        <input type='text' name='username1' size='20' value='$get[username]'>
      </td>
    </tr>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>New Password:</font></b></td>
      <td width='48%'>
        <input type='password' name='newpass' size='20'>
      </td>
    </tr>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>Email:</font></b></td>
      <td width='48%'>
        <input type='text' name='email' size='20' value='$get[email]'>
      </td>
    </tr>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>Date Joined:</font></b></td>
      <td width='48%'>
        <input type='text' name='date' size='20' value='$get[date]'>
      </td>
    </tr>
    <tr> 
      <td width='52%' align='right'><b><font size='2' face='Tahoma'>Login Code:</font></b></td>
      <td width='48%'>
        <input type='text' name='login_code' size='20' value='$get[login_code]'>
        <input type='hidden' name='Esave'>
        <input type='hidden' name='id1' value='$id'>
      </td>
    </tr>
  </table>
  <p align='center'> 
    <input type='submit' value='Change' name='B1'>
    <input type='reset' value='Never Mind' name='B2'>
  </p>
</form></center>");
}

if($page == 'Home')
{
print("<p><font size='2' face='Tahoma'>Welcome to PHPAuth V1.4, on this page I will be 
  telling you about what features this scripts has and how you can use them to make your site more better for your users, make 
  sure you don't delete or change this page for later reference.</font></p>
<ul>
  <li><b><font size='2' face='Tahoma'>Manage Users</font></b></li>
</ul>
<p><font size='2' face='Tahoma'>This is a page where you can see info about members 
  of your site, to start with there is only one member, that's me.</font></p>
<p><font size='2' face='Tahoma'><i>Sorting</i>: you can sort the members by ID, 
  username, Email, date joined and last login, this will help you to see which 
  user has been more active on your site.</font></p>
<p><font size='2' face='Tahoma'><i>Actions</i>: Edit allows you to edit details 
  of a member, e.g. you can change his/her Username or password. Delete allows 
  to delete any users which haven't logged in for a while or any unwanted users.</font></p>
<ul>
  <li><b><font size='2' face='Tahoma'>Mailing List</font></b></li>
</ul>
<p><font size='2' face='Tahoma'>This is just a simple form with a subject and 
  Email body box which can be used to send news letters to any subscribers. Only 
  those who have a Orange color coding on their usernames will get your news letter.</font></p>
<ul>
  <li><b><font size='2' face='Tahoma'>Update Profile</font></b></li>
</ul>
<p><font size='2' face='Tahoma'>This page allows you to edit your Username, password 
  and your Email address, but make sure you only type in password field when you 
  WANT to change a password, otherwise leave it blank and update the rest.</font></p>
<ul>
  <li><b><font size='2' face='Tahoma'>Site Codes</font></b></li>
</ul>
<p><font size='2' face='Tahoma'>This page has html/php codes which you can use 
  at your main site, e.g. Site Stats, this will allow you to get daily stats on 
  your website without any problems.</font></p>
<ul>
  <li><b><font size='2' face='Tahoma'>Add A Admin</font></b></li>
</ul>
<p><font size='2' face='Tahoma'>If you would like someone else to manage the
users and send newsletters then you can use this page and add them to admin data
base. please remember that all users in admin database have <b>same permissions</b>,
so any one can <b>delete/edit the user information</b> as well as site
information. So choose someone you really can trust!.</font></p>");
}
elseif($page == 'Manage Users')
{

if(!isset($start)) $start = 0;
$perpage = "15";
?>
 <table width='' border='0' cellpadding='0' cellspacing='0'>
    <tr> 
      <td  width='68' height='16' valign='middle' align='center' style='border-left: 1 solid #000000; border-top: 1 solid #000000; border-bottom: 1 solid #000000'><font size='2' face='Tahoma'><a href='main.php?page=Manage%20Users&&sort=ID'><b>ID</b></a></font></td>
      <td width='147' valign='middle' align='center' style='border-left: 1 solid #000000; border-top: 1 solid #000000; border-bottom: 1 solid #000000'><font size='2' face='Tahoma'><a href='main.php?page=Manage%20Users&&sort=username'><b>Username</b></a></font></td>
      <td width='145' valign='middle' align='center' style='border-left: 1 solid #000000; border-top: 1 solid #000000; border-bottom: 1 solid #000000'><font size='2' face='Tahoma'><a href='main.php?page=Manage%20Users&&sort=email'><b>Email</b></a></font></td>
      <td width='145' valign='middle' align='center' style='border-left: 1 solid #000000; border-top: 1 solid #000000; border-bottom: 1 solid #000000'><font size='2' face='Tahoma'><a href='main.php?page=Manage%20Users&&sort=date'><b>Date 
        Joined </b></a></font></td>
      <td width='145' valign='middle' align='center' style='border-left: 1 solid #000000; border-top: 1 solid #000000; border-bottom: 1 solid #000000'><font size='2' face='Tahoma'><a href='main.php?page=Manage%20Users&&sort=last_login'><b>Last 
        Login</b></a></font></td>
      <td width='154' valign='middle' align='center' style='border: 1 solid #000000'><font face='Tahoma' size='2'><b>Action</b></font></td>
    </tr>
<?php
if(!$sort)
{
$sort = "ID";
}

$sql = mysql_query("SELECT ID, `username`,`email`, mailing_list, date,last_login,`login_code` FROM `users` WHERE 1 ORDER BY `$sort` ASC LIMIT $start, $perpage");


if($n == NULL)
{
$n = 1;
}

while(list($ID, $username,$email,$mailing_list,  $date,$last_login,$login_code) = mysql_fetch_row($sql))
{
if($mailing_list == '1')
{
$color = "<font color='Orange'>";
}
else
{
$color = "";
}
print("<tr> 
      <td  height='19' valign='middle' style='border-left: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'>$n</font></div>
      </td>
      <td valign='middle' style='border-left: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'>$color $username</font></font></div>
      </td>
      <td valign='middle' style='border-left: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'>$email</font></div>
      </td>
      <td valign='middle' style='border-left: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'>$date</font></div>
      </td>
      <td valign='middle' style='border-left: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'>$last_login</font></div>
      </td>
      <td valign='middle' style='border-left: 1 solid #000000; border-right: 1 solid #000000; border-bottom: 1 solid #000000'> 
        <div align='center'><font size='2' face='Tahoma'><a href='main.php?page=Edit&&id=$ID'>Edit</a> - <a href='main.php?page=Manage Users&&action=del&&id=$ID'>Delete</a></font></div>
      </td>
    </tr>");
	$n++;

}
$query = "SELECT count(*) as count FROM users"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$numrows = $row['count'];


if(IsSet($action))
{

if($action == 'del')
{
$del = mysql_query("DELETE FROM users WHERE ID=$id limit 1");
Print("User has been Deleted");
}
}

?>
</table>

<?php
$p = $start - $perpage;
if($start > 0) echo "<center><b><font size='2' face='Tahoma'>[<a href=\"main.php?page=$page" . "&&start=" . ($start - $perpage) . 
        "&no=$p\">Previous</a>]</b></font></font>";
		
		if($numrows > ($start + $perpage)) 
   echo "<center><b><font size='2' face='Tahoma'>[<a href=\"main.php?page=$page" . "&&start=" . ($start + $perpage) . 
        "&no=$n\">Next</a>]</b></font>";
print("<font size='2'><center><p></p>*Names in <font color='Orange'>Orange</font> color are mailing list subscribers</p>");
}

if($page == 'Update Profile')
{
If(IsSet($update_pro))
{

if(!empty($new_pass))
{
$new_pass = MD5($new_pass);
$update = "update admin set username='$new_username', password='$new_pass', email='$new_email' where username='$admin_name1'";
}
else
{
$update = "update admin set username='$new_username', email='$new_email' where username='$admin_name1'";
}
$doit = mysql_query($update) or die ("Unable to update your profile...");
$site_in = mysql_query("update site_info set url='$url', site_name='$sitename' where ID='1'");
print("Your Profile has been updated, you will have to <a href='login.php'>login</a> agian...<p>");
session_destroy();
}
$getin = mysql_query("SELECT `url`,`site_name` FROM `site_info` where ID='1'");
$geta = mysql_query("SELECT * FROM admin where username='$admin_name1'");
$gott = mysql_fetch_array($getin);
$gota = mysql_fetch_array($geta);
print("<font face='Tahoma' size='2'>Only type a password when you need to change it, 
otherwise leave it blank and update the rest, don't forget to type in your username in both fields when you update other fields!<center> 
<form name='profile' method='post' action=''>
  <table width='284' border='0' cellpadding='0' cellspacing='0'>
    <tr> 
      <td height='28' width='154' valign='middle'> 
        <div align='right'><font size='2'><b><font face='Tahoma'>Site Name:</font></b></font></div>
      </td>
      <td valign='top' width='130'> 
        <input type='text' name='sitename' value='$gott[site_name]'>
      </td>
    </tr>
	<tr> 
      <td height='28' width='154' valign='middle'> 
        <div align='right'><font size='2'><b><font face='Tahoma'>Site URL:</font></b></font></div>
      </td>
      <td valign='top' width='130'> 
        <input type='text' name='url' value='$gott[url]'>
      </td>
    </tr>
    <tr> 
      <td height='28' valign='middle'> 
        <div align='right'><font size='2'><b><font face='Tahoma'>New Username:</font></b></font></div>
      </td>
      <td valign='top'> 
        <input type='text' name='new_username' value='$admin_name1'>
      </td>
    </tr>
    <tr> 
      <td height='28' valign='middle'> 
        <div align='right'><font face='Tahoma' size='2'><b>New Password:</b></font></div>
      </td>
      <td valign='top'> 
        <input type='password' name='new_pass'>
      </td>
    </tr>
    <tr> 
      <td valign='middle' height='28'> 
        <div align='right'><b><font size='2' face='Tahoma'>New Email:</font></b></div>
      </td>
      <td valign='top'> 
        <input type='text' name='new_email' value='$gota[email]'>
      </td>
    </tr>
    <tr> 
      <td height='0'></td>
      <td></td>
    </tr>
  </table>
  <input type='submit' value=' Update ' name='submit'>
  <input type='hidden' name='update_pro'>
</form>");
}





if($page == 'Site Codes')
{
print("<center>
<table border='0' width='559'>
  <!--DWLayoutTable-->
  <tr valign='middle'> 
    <td height='21' valign='bottom' colspan='2'><font size='2'><b><font face='Tahoma'>Site 
      Stat Box Code</font></b></font></td>
    <td width='15'></td>
  </tr>
  <tr valign='middle'> 
    <td height='34' valign='top' colspan='3'><font size='2' face='Tahoma'>Use 
      this in a site stat box, maybe like a one you see on the the left of your 
      screen, just paste the code and edit the db settings...away you go.</font></td>
  </tr>
  <tr valign='middle'> 
    <td height='519' valign='top' colspan='3'> <font size='2' color='#FF0000' face='Tahoma'> 
      &lt;?php<br>
      @mysql_connect('localhost','username', 'password'); //db host, username 
      , password<br>
      @mysql_select_db('phpauth'); // db name 
      <p>\$sql = mysql_query(&quot;select * from users&quot;);<br>
        \$users = mysql_num_rows(\$sql);</p>
      <p>\$sql = mysql_query(&quot;select * from daily_hits&quot;);<br>
        \$daily = mysql_num_rows(\$sql);</p>
      <p>\$sql = mysql_query(&quot;select counter from counter&quot;);<br>
        \$count = mysql_fetch_array(\$sql);</p>
      <p>\$result = mysql_query(&quot;SELECT DISTINCT ip FROM usersonline&quot;); 
        <br>
        if(!(\$result)) { <br>
        print &quot;Useronline Select Error &gt; &quot;; <br>
        } <br>
        \$user = mysql_num_rows(\$result); <br>
        if(\$user == 1) { <br>
        \$online = &quot;\$user User Online \n&quot;;<br>
        } else { <br>
        \$online = &quot;Users Online: \$user\n&quot;; <br>
        }</p>
      <p>print(&quot;<br>
        Total Users: \$users&lt;br&gt;<br>
        Hits Today: \$daily&lt;br&gt;<br>
        Total Hits: \$count[counter]&lt;br&gt;<br>
        \$online&quot;);<br>
        ?&gt;</p>
      </font></td>
  </tr>
  <tr valign='middle'> 
    <td height='26' colspan='3'><font face='Tahoma' size='2'><b>Users Online Code</b></font></td>
  </tr>
  <tr valign='middle'> 
    <td height='18' valign='top' colspan='3'><font face='Tahoma' size='2'>You 
      must add this code on all your pages, it tracks how many users are online.</font></td>
  </tr>
  <tr valign='middle'> 
    <td height='478' valign='top' colspan='3'>&nbsp;<font color='#FF0000' size='2' face='Tahoma'>&lt;?php</font> 
      <p><font color='#FF0000' size='2' face='Tahoma'>@mysql_connect('localhost','username','password') 
        ;// db host infmation<br>
        @mysql_select_db('phpauth'); // db name</font></p>
      <p><font color='#FF0000' size='2' face='Tahoma'>\$timeoutseconds = 30; <br>
        \$timestamp = time(); <br>
        \$timeout = \$timestamp-\$timeoutseconds; <br>
        \$insert = mysql_query(&quot;INSERT INTO usersonline VALUES ('\$timestamp','\$REMOTE_ADDR','\$page')&quot;); 
        <br>
        if(!(\$insert)) { <br>
        print &quot;Useronline Insert Failed &gt; &quot;; <br>
        } <br>
        \$delete = mysql_query(&quot;DELETE FROM usersonline WHERE timestamp&lt;\$timeout&quot;); 
        <br>
        if(!(\$delete)) { <br>
        print &quot;Useronline Delete Failed &gt; &quot;;<br>
        } <br>
        \$result = mysql_query(&quot;SELECT DISTINCT ip FROM usersonline&quot;); 
        <br>
        if(!(\$result)) { <br>
        print &quot;Useronline Select Error &gt; &quot;; <br>
        } <br>
        \$user = mysql_num_rows(\$result); <br>
        if(\$user == 1) { <br>
        \$online = &quot;\$user User Online \n&quot;;<br>
        } else { <br>
        \$online = &quot;Users Online: \$user\n&quot;; <br>
        } </font></p>
      <p><font color='#FF0000' size='2' face='Tahoma'>?&gt;</font></p></td>
  </tr>
  <tr valign='middle'> 
    <td height='20' width='528'></td>
    <td width='2'></td>
    <td></td>
  </tr>
  <tr valign='middle'> 
    <td height='23' valign='bottom'><b><font size='2' face='Tahoma'>Daily Hit 
      Counter &amp; Total Hit Count</font></b></td>
    <td></td>
    <td></td>
  </tr>
  <tr valign='middle'> 
    <td height='34' colspan='3' valign='top'><font size='2' face='Tahoma'>Add 
      this code in to your index.php page, it will count the daily hits and also 
      the total hits to your site, make sure you edit the db settings first.</font></td>
  </tr>
  <tr valign='middle'> 
    <td height='264' colspan='3' valign='top'><font color='#FF0000' size='2' face='Tahoma'> 
      &lt;?php<br>
      //daily hit counter and total count source code<br>
      @mysql_connect('localhost','username','password');//host address,username, 
      password<br>
      @mysql_select_db('phpauth');// db name 
      <p>\$date = date(&quot;j/m/Y&quot;);<br>
        \$daily1 = &quot;INSERT INTO `daily_hits` (date, ip) VALUES ('\$date', 
        '\$REMOTE_ADDR')&quot;;<br>
        \$re = mysql_query(\$daily1);<br>
        \$delete = &quot;DELETE FROM daily_hits WHERE date &lt;&gt; '\$date'&quot;;<br>
        \$del = mysql_query(\$delete);<br>
        \$main_counter = mysql_query(&quot;SELECT `counter` FROM `counter`&quot;);<br>
        \$gy = mysql_fetch_array(\$main_counter);<br>
        \$new_count = \$gy[counter] + 1;<br>
        \$up = mysql_query(&quot;update counter set counter='\$new_count'&quot;);<br>
        ?&gt;</p>
      </font> </td>
  </tr>
  <tr valign='middle'> 
    <td height='16'></td>
    <td></td>
    <td></td>
  </tr>
  <tr valign='middle'> 
    <td height='23' valign='bottom'><b><font size='2' face='Tahoma'>Members only 
      page code</font></b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign='middle'> 
    <td height='34' colspan='3' valign='top'><font size='2' face='Tahoma'>Add 
      this code in to VERY TOP of a page which you wish to make into members only 
      page, users won't be able to view that page unless they are loged in, you may have to edit the 'inc/VerifyLogin.php' to correct path of VerifyLogin.php.</font></td>
  </tr>
  <tr> 
    <td height='53' colspan='3' valign='top'><p><font color='#FF0000' size='2' face='Tahoma'>&lt;?php<br>
        include(&quot;inc/VerifyLogin.php&quot;);</font></p>
      <p><font color='#FF0000' size='2' face='Tahoma'>?&gt;</font></p></td>
  </tr>
  <tr>
    <td height='59'>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
</table>

");
}

if($page == 'Mailing List')
{
If(IsSet($send))
{
$site_info = mysql_query("select url, site_name from site_info");
$admin_info = mysql_query("select email from admin where username ='$admin_name1'");
$get = mysql_fetch_array($site_info);
$get1 = mysql_fetch_array($admin_info);
$subject = stripcslashes($subject);
$message = stripcslashes($message);
$message .="

***Please note that this is not spam mail, you have made a  account at $get[url] with a option of getting our newsletter from time to time.
If you would like to unsubscribe from this list this go to $get[url]/op.php

***This script was downloaded from www.qadsscripts.t2u.com, get your yours for free.";

$info = mysql_query("Select email from users where mailing_list='1'");
while($row = mysql_fetch_array($info))
{
$usere = $row[0];
$sendmail = mail("$usere", "$subject - $get[site_name]", "$message", "From:$get1[email]");
}
Print("<center><b>News Letter has been sent!</b><p></center>");
}


print("<form name='form1' method='post' action=''>
  <table border='0' width='634'>
    <tr valign='middle'> 
      <td height='30' width='94' valign='top'> 
        <div align='right'><font size='2'><b><font face='Tahoma'>Subject:</font></b></font></div>
      </td>
      <td width='206' valign='top'> 
        <input type='text' name='subject'>
        <input type='hidden' name='send'>
      </td>
      <td width='320'></td>
    </tr>
    <tr valign='middle'> 
      <td height='21' valign='top'> 
        <div align='right'><font face='Tahoma'><b><font size='2'>Email Body:</font></b></font></div>
      </td>
      <td rowspan='2' valign='top' colspan='2'> 
        <textarea name='message' wrap='VIRTUAL' cols='50' rows='15'></textarea>
      </td>
    </tr>
    <tr valign='middle'> 
      <td height='219'></td>
    </tr>
    <tr valign='middle' align='center'> 
      <td height='21' colspan='3'> 
        <div align='center'> 
          <input type='submit' name='Submit' value='Send News Letter'>
        </div>
      </td>
    </tr>
  </table>
</form>
");
}


if($page == 'Logout')
{
session_destroy();
Print("You are now loged out of PHPAuth, <a href='login.php'>Click here</a> to login agian...");
}

if($page == 'New Admin')
{
Print("<form method=\"POST\" action=\"main.php?page=New Admin\">
  <table border=\"0\" width=\"100%\">
    <tr>
      <td width=\"50%\" align=\"right\"><font size=\"2\" face=\"Tahoma\"><b>*Username:</b></font></td>
      <td width=\"50%\"><input type=\"text\" name=\"admin_n\" size=\"20\"></td>
    </tr>
    <tr>
      <td width=\"50%\" align=\"right\"><font size=\"2\" face=\"Tahoma\"><b>*Password:</b></font></td>
      <td width=\"50%\"><input type=\"password\" name=\"password\" size=\"20\"></td>
    </tr>
    <tr>
      <td width=\"50%\" align=\"right\"><font size=\"2\" face=\"Tahoma\"><b>*Email:</b></font></td>
      <td width=\"50%\"><input type=\"text\" name=\"email\" size=\"20\">&nbsp;<input type=\"submit\" value=\" Ok! \" name=\"B1\"></td>
    </tr>
  </table>
  
  <input type=\"hidden\" name=\"addit\">
</form>");

if(IsSet($addit))
{
if($admin_n && $password && $email > Null)
{
$password = md5($password);
$sql1 = "INSERT INTO `admin` (`username`, `password`, `email`) VALUES ('$admin_n', '$password', '$email')";
$sql = mysql_query($sql1) or die ("unable to add $admin_n to  database...mysql said:".mysql_error()."");
print("$admin_n has been added to database...");
}
else
{
print("Please fill in all * fields...");
}
}
if(IsSet($dea))
{
$delete = mysql_query("delete from admin where ID ='$dea' limit 1");
print("admin[$dea] has been deleted...");
}
print("<center><b>Current Admins</b><P><table border=\"0\" width=\"100%\" cellspacing height=\"63\">
  <tr>
    <td width=\"7%\" valign=\"middle\" style=\"border-left: 1 solid #000000; border-right: 1 solid #000000; border-top: 1 solid #000000\" height=\"15\" align=\"center\">
      <p align=\"center\"><b><font size=\"2\" face=\"Tahoma\">#</font></b></td>
    <td width=\"29%\" valign=\"middle\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" height=\"15\" align=\"center\"><b><font size=\"2\" face=\"Tahoma\">Username</font></b></td>
    <td width=\"50%\" valign=\"middle\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" height=\"15\" align=\"center\"><b><font size=\"2\" face=\"Tahoma\">Email</font></b></td>
    <td width=\"17%\" valign=\"middle\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" height=\"15\" align=\"center\"><b><font size=\"2\" face=\"Tahoma\">Actions</font></b></td>
  </tr>");
  $getin = mysql_query("select ID, username, email from admin");
  $no = 1;
while(list($ID, $username, $email) = mysql_fetch_row($getin))
{
if($username == $admin_name1)
{
$username = "<b>$username</b>";
}
print("<tr>
    <td width=\"7%\" valign=\"middle\" height=\"21\" style=\"border-left: 1 solid #000000; border-right: 1 solid #000000; border-top: 1 solid #000000\" bgcolor=\"$random\">
      <p align=\"center\"><font size=\"2\" face=\"Tahoma\">$no</font></td>
    <td width=\"29%\" valign=\"middle\" height=\"21\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" bgcolor=\"$random\"><font size=\"2\" face=\"Tahoma\">&nbsp;$username</font></td>
    <td width=\"50%\" valign=\"middle\" height=\"21\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" bgcolor=\"$random\"><font size=\"2\" face=\"Tahoma\">&nbsp;$email</font></td>
    <td width=\"17%\" valign=\"middle\" height=\"21\" style=\"border-right: 1 solid #000000; border-top: 1 solid #000000\" bgcolor=\"$random\">
      <p align=\"center\"><a href=\"?page=New Admin&dea=$ID\"><font size=\"2\" face=\"Tahoma\">Delete</font></a></td>
  </tr>");
$no++;
}
print("<tr>
  
    <td width=\"7%\" valign=\"middle\" height=\"21\" style=\"border-top: 1 solid #000000\">&nbsp;</td>
    <td width=\"29%\" valign=\"middle\" height=\"21\" style=\"border-top: 1 solid #000000\">&nbsp;</td>
    <td width=\"50%\" valign=\"middle\" height=\"21\" style=\"border-top: 1 solid #000000\">&nbsp;</td>
    <td width=\"17%\" valign=\"middle\" height=\"21\" style=\"border-top: 1 solid #000000\">&nbsp;</td>
  </tr>
</table>");

}
?>