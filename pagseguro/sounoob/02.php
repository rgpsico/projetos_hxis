<?php
/*
$email = 'rgyr2010@hotmail.com';
$token = '97820290-7bfc-4f6b-9c7f-b698fcbf7167a2f4908840b8828959f5cf8af6b76f52767f-6b31-4e3d-9d49-d63518c2c4a7';
*/
?>
<?php


//$data = 'email=seuemail@dominio.com.br&amp;token=95112EE828D94278BD394E91C4388F20&amp;currency=BRL&amp;itemId1=0001&amp;itemDescription1=Notebook Prata&amp;itemAmount1=24300.00&amp;itemQuantity1=1&amp;itemWeight1=1000&amp;itemId2=0002&amp;itemDescription2=Notebook Rosa&amp;itemAmount2=25600.00&amp;itemQuantity2=2&amp;itemWeight2=750&amp;reference=REF1234&amp;senderName=Jose Comprador&amp;senderAreaCode=11&amp;senderPhone=56273440&amp;senderEmail=comprador@uol.com.br&amp;shippingType=1&amp;shippingAddressStreet=Av. Brig. Faria Lima&amp;shippingAddressNumber=1384&amp;shippingAddressComplement=5o andar&amp;shippingAddressDistrict=Jardim Paulistano&amp;shippingAddressPostalCode=01452002&amp;shippingAddressCity=Sao Paulo&amp;shippingAddressState=SP&amp;shippingAddressCountry=BRA';
/*
Caso utilizar o formato acima remova todo código abaixo até instrução $data = http_build_query($data);
*/
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
$data['email'] = 'rgyr2010@hotmail.com';
$data['token'] = 'E2727ABA4A63440CBBD5C9B765A8E551';
$data['currency'] = 'BRL';

$data['itemId1'] = '0001';
$data['itemDescription1'] = 'Notebook Prata';
$data['itemAmount1'] = '24.00';
$data['itemQuantity1'] = '1';
$data['itemWeight1'] = '1000';



$data['reference'] = 'REF1234';
$data['senderName'] = 'Jose Comprador';
$data['senderAreaCode'] = '21';
$data['senderPhone'] = '990271287';
$data['senderEmail'] = 'gerro121@hotmail.com';

$data['shippingType'] = '1';
$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
$data['shippingAddressNumber'] = '1384';
$data['shippingAddressComplement'] = '5o andar';
$data['shippingAddressDistrict'] = 'Jardim Paulistano';
$data['shippingAddressPostalCode'] = '01452002';
$data['shippingAddressCity'] = 'Sao Paulo';
$data['shippingAddressState'] = 'SP';
$data['shippingAddressCountry'] = 'BRA';
$data['redirectURL'] = 'http://rogerneves.com.br/paginaDeAgracedimento';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
    //Insira seu código de prevenção a erros
   die('erro');
    exit;//Mantenha essa linha
}
curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
    //Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
  die('erro');
    exit;
}
header('Location:https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);
?>