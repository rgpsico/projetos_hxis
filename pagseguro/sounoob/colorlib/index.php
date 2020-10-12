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
$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
$data['email'] = 'rgyr2010@hotmail.com';
$data['token'] = '97820290-7bfc-4f6b-9c7f-b698fcbf7167a2f4908840b8828959f5cf8af6b76f52767f-6b31-4e3d-9d49-d63518c2c4a7';
if(isset($_POST['comprar'])){


$data['currency'] = 'BRL';

$data['itemId1'] = '0010';
$data['itemDescription1'] = 'Curso Marketing digital';
$data['itemAmount1'] = '600.00';
$data['itemQuantity1'] = '1';
$data['itemWeight1'] = '1000';



$data['reference']                 = 'REF123';
$data['senderName']                = $_POST['nome'];//nome
$data['senderAreaCode']            = $_POST['ddd'];; // ddd
$data['senderPhone']               = $_POST['cel']; //cel 
$data['senderEmail']               = $_POST['email'];//email

$data['shippingType'] = '1';
$data['shippingAddressStreet']     = $_POST['rua'];//rua
$data['shippingAddressNumber']     = $_POST['numero'];//numero
$data['shippingAddressComplement'] = $_POST['complemento']; //complemento
$data['shippingAddressDistrict']   = $_POST['bairro']; //bairro
$data['shippingAddressPostalCode'] = $_POST['cep'];//cep
$data['shippingAddressCity']       = $_POST['cidade'];//cidade
$data['shippingAddressState']      = $_POST['estado'];//estado
$data['shippingAddressCountry']    = 'BRA';
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
var_dump($data);
    exit;//Mantenha essa linha
}
curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
    //Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.

var_dump($data);

    exit;
}
header('Location:https://pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code);

}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">O melhor curso do Brasil</h2>
                </div>
                <div class="card-body">
                    <form method="POST" >
                     

                        <div class="form-row m-b-55">
                            <div class="name">Nome</div>
                            <div class="value">
                                <div class="row row-space">
                                  <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nome" value="Roger Neves">
                                         </div>
                                    </div>                             
                            </div>
                        </div>
                    </div>
  

                      

                     

                        <div class="form-row">
                            <div class="name">Email:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="gerro121@hotmail.com">
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Cel:</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="ddd" value="21">
                                            <label class="label--desc">DDD</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="cel" value="990271287">
                                            <label class="label--desc">Telefone:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
     
                          <div class="form-row m-b-55">
                            <div class="name">Cidade:</div>
                            <div class="value">
                                <div class="row row-refine">
                                   
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="cidade" value="Rio de janeiro">
                                            <label class="label--desc">Cidade:</label>
                                        </div>
                                    </div>

                                     <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="estado" value="RJ">
                                            <label class="label--desc">Estado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <div class="form-row m-b-55">
                            <div class="name">Rua:</div>
                            <div class="value">
                                <div class="row row-refine">
                                   
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="rua" value="Sant roman 200">
                                            <label class="label--desc">Rua:</label>
                                        </div>
                                    </div>

                                     <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="numero_rua" value="200">
                                            <label class="label--desc">Numero</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    <div class="form-row">
                            <div class="name">Complemento:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="complemento" value="">
                                </div>
                            </div>
                        </div>

                            <div class="form-row">
                            <div class="name">Bairro:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="bairro" value="Copacabana">
                                </div>
                            </div>
                        </div>


                          <div class="form-row">
                            <div class="name">Cep:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="cep" value="22071060">
                                </div>
                            </div>
                          </div>


                     
                  


                     
                        <div>
                            <input class="btn btn--radius-2 btn--red" name="comprar"  type="submit" value="comprar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->