<?php
include('_app/Config.inc.php');
$read = new Read();
$read->ExeRead('ws_posts','limit 1');
if($read){
	foreach ($read->getResult() as $key => $value) {
	echo json_encode($value);
	}
}

 ?>
