<?php
include("admin/inc/type.inc.php");
include("admin/inc/db.inc.php");
if(IsSet($log))
{
	$username = $_POST['user'];
	$password = md5($_POST['password']);
	
	session_start();
	$_SESSION['username'] = $username;
	
	//set up the query
		$query = "SELECT * FROM users 
			WHERE username='$username' AND password='$password'";
$ll = date("j/m/Y");			
	//run the query and get the number of affected rows
	$result = mysql_query($query) or die('error making query');
	$affected_rows = mysql_num_rows($result);

	//if there's exactly one result, the user is validated. Otherwise, he's invalid
	if($affected_rows == 1) {
	$array = mysql_fetch_array($result);
	$email = $array[email];
	$lastl = $array[last_login];
	$_SESSION['email'] = $email;
	$_SESSION['lastl'] = $lastl;
$last_login = mysql_query("update users set last_login='$ll' where username = '$username' limit 1");
		header("Location: main.php");
	}
	else {
	session_destroy();
		print ("Your Username or password is not correct, please login agian...");
	}
	}
?>
<p align="center">&nbsp;</p>

<p align="center"><b><center>User Login</b></p>
<form method="POST" action="login.php">

  <table border="0" width="30%">
    <tr>
      <td width="26%" align="right"><b>Username:</b></td>
      <td width="74%"><input type="text" name="user" size="16" value="user"></td>
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