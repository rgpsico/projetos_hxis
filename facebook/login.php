<?php 
require('fb.php');

$helper = $fb->getRedirectLoginHelper();
$permissions = array('email,user_posts');

$loginurl = $helper->getLoginUrl('https://rogerneves.com.br/teste/facebook/callback.php', $permissions);

 ?>

 <a href="<?php echo  htmlspecialchars($loginurl) ?>">Login facebook</a>