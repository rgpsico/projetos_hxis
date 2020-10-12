<?php
// Documentação disponível em: 
// https://dev.pagseguro.uol.com.br/documentacao/pagamentos/pagamento-padrao

// URL DE SANDBOX
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

$data['email'] = 'rgyr2010@hotmail.com';
$data['token'] = 'E2727ABA4A63440CBBD5C9B765A8E551';
$data['currency'] = 'BRL';

$data['itemId1'] = "1";
$data['itemDescription1'] = "Descrição do item/produto";
$data['itemAmount1'] = 199.90;
$data['itemQuantity1'] = 1;
$data['itemWeight1'] = 0;
$data['reference'] = 989898787787874545; //aqui vai o código que será usado para 
//receber os retornos das notificações
$data['senderName'] = "Nome do comprador";
// $data['senderAreaCode'] = "";
// $data['senderPhone'] = "";
$data['senderEmail'] = "comprador@gmail.com";
// $data['shippingType'] = "";
// $data['shippingAddressStreet'] = "";
// $data['shippingAddressNumber'] = "";
// $data['shippingAddressComplement'] = "";
// $data['shippingAddressDistrict'] = "";
// $data['shippingAddressPostalCode'] = "";
// $data['shippingAddressCity'] = "";
// $data['shippingAddressState'] = "";
// $data['shippingAddressCountry'] = "";

$data['redirectURL'] = 'https://rogerneves.com.br/pedido-finalizado';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
  echo "Unauthorized";
  exit();
}

curl_close($curl);

$xml= simplexml_load_string($xml);

if(count($xml->error) > 0){
  echo "XML ERRO";
  exit();
}

// Utilize sua lógica para atualizar o pedido com o código da transação, para ser atualizado depois
//$db->query("UPDATE pedido SET token = '{$xml->code}' WHERE id = $pedido_id"); 

// Redireciona o comprador para a página de pagamento
header('Location:https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml->code);