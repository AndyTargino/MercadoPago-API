<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');

$data = json_decode(file_get_contents('php://input'), true);

MercadoPago\SDK::setAccessToken(SAND_TOKEN);

//Montar request de boleto e gerar novo boleto para pagamento

$payment = new MercadoPago\Payment();
$payment->transaction_amount = $data['transaction_amount'];
$payment->description = $data['description'];
$payment->payment_method_id = 'bolbradesco';
$payment->payer = array(
    "email" => $data['payer']['email'],
    "first_name" => $data['payer']['first_name'],
    "last_name" => $data['payer']['last_name'],
    "identification" => array(
        "type" => $data['payer']['identification']['type'],
        "number" => $data['payer']['identification']['number']
    )
);

$payment->save();

//Após o envio da request e obter sua resposta, mostre para o usuario os dados de retorno nessessários para salvar no banco de dados também
$formated_total = "R$ " . number_format($data['transaction_amount'], 2, ',', '.');
$url_boleto = $payment->transaction_details->external_resource_url; //url do boleto
$id = $payment->id; //Id do pagamento (Necessário para verificar status do pagamento desta transação)
$status = $payment->status; //Status atual do pagamento
//O boleto sempre terá status como pendente assim que for gerado, diferente do cartao de credito que terá dois estados -> pending, accept
if ($status == 'pending') {
    $status = 'Aguardando Pagamento';
    $msg = "<p>Obrigado, <strong>" . $data['payer']['first_name'] . "</strong>!</p> <p>O status atual do seu pagamento via <strong>" . $data['forma_pagamento'] . "</strong> é <strong>" . $status . "</strong> e o código da transação junto ao MercadoPago é <strong>" . $id . "</strong>.</p> <p>O valor total é de <strong>" . $formated_total . ". </strong><a target='new' href=" . $url_boleto . ">Clique aqui</a> para imprimir o boleto.</p>";
    $response = (['status' => $status, 'status_detail' => $payment->status_detail, 'id' => $payment->id, 'mensagem' => $msg, 'boleto' => $url_boleto]);
    echo json_encode($response);
} else {
    $msg = "<p>Ocorreu um erro ao gerar o boleto..</p>";
    $response = (['status' => 400, 'mensagem' => $msg]);
    echo json_encode($response);
}
