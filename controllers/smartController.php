<?php
require('../config/config.php');
require('../lib/vendor/autoload.php');
// obtendo todos os campos do json enviados.
/*
SAND_TOKEN definida no arquivo de configuração no diretório /config/config.php
*/
$data = json_decode(file_get_contents('php://input'), true);

//MercadoPago\SDK from php composer.phar require "mercadopago/dx-php"

MercadoPago\SDK::setAccessToken(PROD_TOKEN);

$data = ($_POST);
$preference = new MercadoPago\Preference();
$item = new MercadoPago\Item();
$item->title = $data['produto'];
$item->quantity = 1;
$item->unit_price = $data['amount'];
$preference->items = array($item);
$preference->save();
print($preference->id);
