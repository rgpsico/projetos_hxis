<?php 
session_start();
require 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
'app_id' => '485216912100018',
'app_secret'=> 'ee31b363af3d1ec76feb00c10bad4908',
'default_graph_version' => 'v2.7',
'persistent_data_handler'=>'session'
]);

 ?>