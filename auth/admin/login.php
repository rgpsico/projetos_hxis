<?php
include("inc/type.inc.php");
include("inc/db.inc.php");
if(IsSet($log))
{
	$username = $_POST['user'];
	$password = md5($_POST['password']);
	
	session_start();
	$_SESSION['username'] = $username;

	//set up the query
	$query = "SELECT * FROM admin 
			WHERE username='$username' AND password='$password'";
			
	//run the query and get the number of affected rows
	$result = mysql_query($query) or die('error making query');
	$affected_rows = mysql_num_rows($result);
 
	//if there's exactly one result, the user is validated. Otherwise, he's invalid
	if($affected_rows == 1) {
	$aid1 = mysql_fetch_array($result);
	$aid = $username;	
	$_SESSION['aid'] = $aid;
	header("Location: main.php?page=Home");
	}
	else {
	session_destroy();
		print ("Your Username or password is not correct, please <a href='login.php'>login</a> agian....$admin_name1");
}	}
?>
<p align="center">&nbsp;</p>

<p align="center"><b><center>Admin Login</b></p>
<form method="POST" action="login.php">

  <table border="0" width="30%">
    <tr>
      <td width="26%" align="right"><b>Username:</b></td>
      <td width="74%"><input type="text" name="user" size="16" value="admin"></td>
    </tr>
    <tr>
      <td width="26%" align="right"><b>Password:</b></td>
      <td width="74%"><input type="password" name="password" size="16" value="pass"></td>
    </tr>
  </table> <input type="hidden" name="log" value="1">
    <p align="center"><input type="submit" value="Enter" name="B1"></p>
</form>
</center>
<p align="center"><a href="http://www.qadsscripts.t2u.com"><font size="2">QadsScripts</font></a></p>