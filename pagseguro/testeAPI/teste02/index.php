<?php
header("access-control-allow-origin: https://pagseguro.uol.com.br");
header("Content-Type: text/html; charset=UTF-8",true);
date_default_timezone_set('America/Sao_Paulo');

require_once("pagseguro/PagSeguro.class.php");
$PagSeguro = new PagSeguro();
  
//EFETUAR PAGAMENTO 
$venda = array("codigo"=>"1",
         "valor"=>"100.00",
         "descricao"=>"VENDA DE NONONONONONO",
         "nome"=>"roger",
         "email"=>"rgdogalo@gmail.com",
         "telefone"=>"(21)99027-1287",
         "rua"=>"sant roman 200",
         "numero"=>"200",
         "bairro"=>"copacabana",
         "cidade"=>"rio de janeiro",
         "estado"=>"RJ", //2 LETRAS MAIÚSCULAS
         "cep"=>"22.071-060",
         "codigo_pagseguro"=>10025);
         
$PagSeguro->executeCheckout($venda,"http://SEUSITE/pedido/".$_GET['codigo']);

//----------------------------------------------------------------------------


//RECEBER RETORNO
if( isset($_GET['transaction_id']) ){
  $pagamento = $PagSeguro->getStatusByReference($_GET['codigo']);
  
  $pagamento->codigo_pagseguro = $_GET['transaction_id'];
  if($pagamento->status==3 || $pagamento->status==4){
    //ATUALIZAR DADOS DA VENDA, COMO DATA DO PAGAMENTO E STATUS DO PAGAMENTO
    
  }else{
    //ATUALIZAR NA BASE DE DADOS
  }
}

?>