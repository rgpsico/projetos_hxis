<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'um57121214');
define('DBNAME', 'Roger');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

