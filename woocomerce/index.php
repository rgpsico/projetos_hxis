<?php

//ck_4162f46d866d0c8aca864f1182b374d35abf6ec2


require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;


$woocommerce = new Client(
    'https://rogerneves.com.br/teste/woocomerce', 
    'ck_4162f46d866d0c8aca864f1182b374d35abf6ec2', 
    'cs_30d41633fa09475498d9c2d64c474ad3aa988fe0',
    [
        'version' => 'wc/v3',
    ]
);

 print_r($woocommerce->get('product')); 


?>
