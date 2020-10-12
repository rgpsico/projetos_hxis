<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script type="text/javascript"
  src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
</script>


<script type="text/javascript">
  PagSeguroDirectPayment.setSessionId('sessionId');
</script>


<script type="text/javascript">
  PagSeguroDirectPayment.getSenderHash();
</script>


<script type="text/javascript">
  PagSeguroDirectPayment.getPaymentMethods({
    success: {função de callback para chamadas bem sucedidas},
    error: {função de callback para chamadas que falharam},
    complete: {função de callback para todas chamadas}
  });
</script>


<script type="text/javascript"
  PagSeguroDirectPayment.getBrand({
    cardBin: $("input#cartao").val(),
    success: {função de callback para chamadas bem sucedidas},
    error: {função de callback para chamadas que falharam},
    complete: {função de callback para todas chamadas}
  });
</script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('./PagSeguroLibrary/PagSeguroLibrary.php');
        $paymentRequest = new PagSeguroPaymentRequest(); 
        $paymentRequest->addItem('0001', 'Notebook', 1, 2430.00);  
        $paymentRequest->addItem('0002', 'Mochila',  1, 150.99);  
        $sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');  
        
        
        
        $paymentRequest->setShippingType($sedexCode);  
        $paymentRequest->setShippingAddress(  
  '01452002',  
  'Av. Brig. Faria Lima',  
  '1384',  
  'apto. 114',  
  'Jardim Paulistano',  
  'São Paulo',  
  'SP',  
  'BRA'  
);  
        
        
        
  $paymentRequest->setSender(  
  'João Comprador',  
  'email@comprador.com.br',  
  '11',  
  '56273440',  
  'CPF',  
  '156.009.442-76'  
);
  
  
  
  $paymentRequest->setCurrency("BRL");  
        
  
  
  
  // Referenciando a transação do PagSeguro em seu sistema  
$paymentRequest->setReference("REF123");  
  
// URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento  
$paymentRequest->setRedirectUrl("http://rogerneves.com.br");  
  
// URL para onde serão enviadas notificações (POST) indicando alterações no status da transação  
$paymentRequest->addParameter('notificationURL', 'http://rogerneves.com.br');  
  


$paymentRequest->addPaymentMethodConfig('CREDIT_CARD', 1.00, 'DISCOUNT_PERCENT');  
$paymentRequest->addPaymentMethodConfig('EFT', 2.90, 'DISCOUNT_PERCENT');  
$paymentRequest->addPaymentMethodConfig('BOLETO', 10.00, 'DISCOUNT_PERCENT');  
$paymentRequest->addPaymentMethodConfig('DEPOSIT', 3.45, 'DISCOUNT_PERCENT');  
$paymentRequest->addPaymentMethodConfig('BALANCE', 0.01, 'DISCOUNT_PERCENT');  

$paymentRequest->addParameter('senderBornDate', '07/05/1981'); 


try {  
  
  $credentials = PagSeguroConfig::getAccountCredentials(); 
// getApplicationCredentials()  
  $checkoutUrl = $paymentRequest->register($credentials);  
  
} catch (PagSeguroServiceException $e) {  
    die($e->getMessage());  
}  
  
  
  
  
  
  
  
  ?>
    </body>
</html>
