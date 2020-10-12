<?php

$code = $_POST['notificationCode'];
$type = $_POST['notificationType'];

if($type == 'transaction'){
  $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/".$code."?email=rgyr2010@hotmail.com&token=E2727ABA4A63440CBBD5C9B765A8E551";
  $content = file_get_contents($url);
  $xml = simplexml_load_string($content);

  if($xml->status > 3){
  //  $db->query("UPDATE pedido SET status = 2 WHERE token = '{$xml->reference}'");
  echo "enviado";
  }
}