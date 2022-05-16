          
<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');

MercadoPago\SDK::setAccessToken(SAND_TOKEN);

$payment = new MercadoPago\Payment();
$payment->transaction_amount = 100;
$payment->description = "Título do produto";
$payment->payment_method_id = "pix";
$payment->payer = array(
    "email" => "test@test.com",
    "first_name" => "Test",
    "last_name" => "User",
    "identification" => array(
        "type" => "CPF",
        "number" => "19119119100"
    ),
    "address" =>  array(
        "zip_code" => "06233200",
        "street_name" => "Av. das Nações Unidas",
        "street_number" => "3003",
        "neighborhood" => "Bonfim",
        "city" => "Osasco",
        "federal_unit" => "SP"
    )
);

$payment->save();

echo  "<img style='width: 30%;'src='data:image/png;base64, ".$payment->point_of_interaction->transaction_data->qr_code_base64."' alt='Pix'>"

?>