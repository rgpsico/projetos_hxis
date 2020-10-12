<?php
include("inc/VerifyLogin.php");
include("admin/inc/type.inc.php");
?>
welcome to phpauth 1.5, you are now logged in as <?php print("$username"); ?><br><p>
Add:<br><b>
<p><font face="Tahoma" size="2" color="#FF0000">Step 1:<b>&lt;?php include(&quot;inc/VerifyLogin.php&quot;);
?&gt;</b></font></p>
at the top any page you want only the registered users to see, make sure you replce the content of this (main.php) file with your own,
leavening the top 4 lines!<br>
<p>
<p><font size="2" face="Tahoma">(optional)Step 2: If you need to display user information on a page then use:<br>
for email: &lt;?php echo $email; ?&gt;<br>
for last login date: &lt;?php echo $lastl; ?&gt;<br>
for username: &lt;?php echo $username; ?&gt;<br>
For this to work, step one must be taken!</font>
</p>
<b>Step 3: Useful Links:</b><br>
<a href="changepass.php">
Change Password</a> - changepass.php<br>
<a href="lostpassword.php">
Lost Password</a> - lostpass.php<br><a href='logout.php'>Logout</a> - logout.php<br>
You Need to link to these files from your rest of the site.<p><i>This information also can be found in readme.txt</i></p>