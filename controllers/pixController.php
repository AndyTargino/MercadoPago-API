          
<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');

MercadoPago\SDK::setAccessToken(PROD_TOKEN);

$payment = new MercadoPago\Payment();
$payment->transaction_amount = 100;
$payment->description = "Título do produto";
$payment->payment_method_id = "pix";
$payment->payer = array(
    "email" => "test@test.com",
    "first_name" => "Test",
    "last_name" => "User"
);

$payment->save();
echo '
<img style="width: 30%;"src="data:image/png;base64, ' . $payment->point_of_interaction->transaction_data->qr_code_base64 . '" alt="Pix"><br>

<div class="text-center">
  <input type="text" class="form-control" id="texto" value=' . $payment->point_of_interaction->transaction_data->qr_code . ' aria-describedby="basic-addon2">
  <div class="">
    <button class="btn btn-outline-primary" onclick="copiarTexto()" type="button">Copiar Chave PIX</button>
  </div>
</div>

';

?>