<html>
<head>
<title>PHPAuth v1.5</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#F5F5F5" text="#000000" rightmargin="0" leftmargin="0" topmargin="0" link="#FF0000" vlink="#FF0000" alink="#0099CC">
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="100%" height="77" valign="middle" bgcolor="#0099CC" align="right" style="border-bottom: 1 solid #000000"> 
      <font size="6" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF">PHPAuth 
      V 1.5</font> </td>
  </tr>
</table>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="19" valign="bottom" align="center" colspan="2"><font size="2" face="Tahoma" color="#000000">Current 
      Page: <b> 
      <?php print("$page") ?>
      </b></font><font size="2" face="Tahoma"><b> </b></font></td>
  </tr>
  <tr> 
    <td width="126" valign="top" rowspan="2"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="126" height="19" valign="middle" align="center" bgcolor="#0099CC" style="border: 1 solid #000000"><b><font color="#FFFFFF" face="Tahoma" size="2">Menu</font></b></td>
        </tr>
        <tr> 
          <td valign="top" height="99" align="right" bgcolor="#FFFFFF" style="border-left: 1 solid #000000; border-right: 1 solid #000000; border-bottom: 1 solid #000000"><font size="2" face="Tahoma"><a href='main.php?page=Home'>Home</a> 
            <br>
			<a href='main.php?page=New Admin'>Add A Admin</a> <br>
            <a href='main.php?page=Manage Users'>Manage Users</a> <br>
            <a href='main.php?page=Mailing List'>Mailing List</a> <br>
            <a href='main.php?page=Update Profile'>Update Profile </a><br>
            <a href='main.php?page=Site Codes'>Site Codes </a><br>
            <a href='http://www.qadsscripts.t2u.com' target='_blank'>Help </a><br>
            <a href='main.php?page=Logout'>Logout </a></font></td>
        </tr>
        <tr> 
          <td height="13"></td>
        </tr>
        <tr> 
          <td height="19" valign="middle" align="center" bgcolor="#0099CC" style="border: 1 solid #000000"><b><font color="#FFFFFF" size="2" face="Tahoma">Stats</font></b></td>
        </tr>
        <tr> 
          <td height="18" valign="top" align="right" bgcolor="#FFFFFF" style="border-left: 1 solid #000000; border-right: 1 solid #000000; border-bottom: 1 solid #000000"><font size="2" face="Tahoma"> 
            <?php print("
				$online<br>");
				tot_users();
				$today1 = mysql_query("select * from daily_hits");
				$get2 = mysql_num_rows($today1);
				print("<br>Hits Today: $get2");
				$totalhits = mysql_query("SELECT `counter` FROM `counter");
				$get2 = mysql_fetch_array($totalhits);
				print("<br>Total Hits: $get2[counter]");
				?>
            </font></td>
        </tr>
      </table>
    </td>
    <td height="178" width="667" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="10" height="178"></td>
          <td width="98%" valign="top">
            <!--Main content -->