<?php
include("inc/VerifyLogin.php");
?>
<form method="POST" action="changepass2.php?change=1">
  <table border="0" width="100%" cellspacing>
    <tr>
      <td width="50%" align="right">Current Password:</td>
      <td width="50%"><input type="text" name="c_pass" size="20"></td>
    </tr>
    <tr>
      <td width="50%" align="right">New Password:</td>
      <td width="50%"><input type="text" name="n_pass" size="20"></td>
    </tr>
  </table>
  <p align="center"><input type="submit" value="Change" name="B1"></p>
 
</form>