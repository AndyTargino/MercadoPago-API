<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');
/*
Suas chaves de autenticação estão em: /config/config.php 
*/
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

//O método save envia as informações de pagamento para o mercado pago e retorna um objeto com o status do pagamento
$payment->save();

//Após o envio da request e obter sua resposta, mostre para o usuario os dados de retorno nessessários para salvar no banco também
$formated_total = "R$ " . number_format($data['transaction_amount'], 2, ',', '.');
$status_pagamento = $payment->status;
if ($status_pagamento == 'approved' && $status_pagamento  == 'in_process') {
    $status = 'Em processamento';
    $msg = "<p>Obrigado, <strong>" . $data['payer']['primeiro_nome'] . "</strong>!</p> <p>O status atual do seu pagamento via <strong>Cartao de Credito</strong> é <strong>" . $status_pagamento . "</strong> e o código da transação junto ao MercadoPago é <strong>" . $id . "</strong>.</p> <p>O valor total é de <strong>" . $formated_total . "</strong>.</p>";;
    $response = (['status' => $status, 'status_detail' => $payment->status_detail, 'id' => $payment->id, 'mensagem' => $msg]);
    echo json_encode($response);
} else {
    $msg = "<p>Ocorreu um erro ao finalizar pagamento.</p>";
    $response = (['status' => 'error', 'mensagem' => $msg]);
    echo json_encode($response);
}
