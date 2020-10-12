<?php 
require 'fb.php';

if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token'])){
	$res = $fb->get('/me?fields=email,name,id,picture,birthday,albums', $_SESSION['fb_access_token']);
	
	$r =  json_decode($res->getBody());
  $img = $r->picture->data->url;
   
   echo "<pre>";
      print_r($res);


  echo "<img src='{$img}'>";

 echo "Meu nome é:".$r->name;
echo "<br/>";
 echo "Meu nome é:".$r->birthday;
  echo "Meu album é:".$r->albums->data->created_time;

}else{
	header("Location:login.php");
}
