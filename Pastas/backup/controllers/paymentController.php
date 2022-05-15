<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');

$data = json_decode(file_get_contents('php://input'), true);
MercadoPago\SDK::setAccessToken(PROD_TOKEN);

$payment = new MercadoPago\Payment();
$payment->token = $data['token'];
$payment->description = $data['description'];
$payment->issuer_id = (int)$data['issuer_id'];
$payment->installments = (int)$data['installments'];
$payment->payment_method_id = $data['payment_method_id'];
$payment->transaction_amount = (float)$data['transaction_amount'];
$payer = new MercadoPago\Payer();
$payer->email = $data['payer']['email'];
$payer->identification = array(
    "type" => $data['payer']['type'],
    "number" => $data['payer']['number']
);
$payment->payer = $payer;
$payment->save();
$response = array(
    'status' => $payment->status,
    'status_detail' => $payment->status_detail,
    'id' => $payment->id
);
echo json_encode($response);
