<?php
@mysql_connect('host address','username','password') or die ("Can't connect with the database."); // your DB settings
@mysql_select_db('db name') or die ("Can't connect with the database table."); // DB name
?>