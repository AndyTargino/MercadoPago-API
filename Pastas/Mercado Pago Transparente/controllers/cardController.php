<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');
/*
Suas chaves de autenticação estão em: /config/config.php 
*/
$data = json_decode(file_get_contents('php://input'), true);
MercadoPago\SDK::setAccessToken(SAND_TOKEN);
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

//O método save envia as informações de pagamento para o mercado pago e retorna um objeto com o status do pagamento
$payment->save();
$response = array(
    'status' => $payment->status,
    'status_detail' => $payment->status_detail,
    'id' => $payment->id
);

//Retornar a resposta para o front
echo json_encode($response);
