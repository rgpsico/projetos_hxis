<?php

  $url = 'https://ws.pagseguro.uol.com.br/v2/pre-approvals/request';

  $data['email']    = 'rgyr2010@hotmail.com';
  $data['token']    = 'E2727ABA4A63440CBBD5C9B765A8E551';
  $data['currency'] = 'BRL';

  $data['reference'] = $id_cliente;
  $data['senderName'] = $cliente['nome'];
  $data['senderEmail'] = $cliente['email'];

  // $data['senderAreaCode'] = '55';
  // $data['senderPhone'] = $cliente['telefone'];
  // $data['shippingAddressStreet'] = "";
  // $data['shippingAddressNumber'] = "";
  // $data['shippingAddressPostalCode'] = "";
  // $data['shippingAddressCity'] = "";
  // $data['shippingAddressState'] = "";
  // $data['shippingAddressCountry'] = 'BRA';

  $data['redirectURL'] = 'https://rogerneves.com.br/perfil?pagseguro-ok';

  $data['preApprovalCharge'] = 'auto';
  $data['preApprovalName'] = 'Assinatura mensal';
  $data['preApprovalDetails'] = 'Cobrança de valor mensal para assinatura';
  $data['preApprovalAmountPerPayment'] = 199.99;
  $data['preApprovalPeriod'] = 'MONTHLY';
  $data['preApprovalFinalDate'] = '2020-10-17T19:20:30.45+01:00';
  $data['preApprovalMaxTotalAmount'] = '999.00';

  $data['reviewURL'] = 'https://rogerneves.com.br.com.br/planos';

  $data = http_build_query($data);

  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
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

  header('Location: https://pagseguro.uol.com.br/v2/pre-approvals/request.html?code='.$xml->code);