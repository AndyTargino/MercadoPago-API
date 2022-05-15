<?php
$total = "1";
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => '/controllers/smartController.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_POSTFIELDS => (['amount' => $total, 'produto' => "Produto Teste"]),
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
));
$response_smart = curl_exec($curl);
curl_close($curl);
echo $response_smart;
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Pagamento Mercado Pago</title>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="card col-md-9 col-lg-6" style="margin-top: 5%;">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" onclick="cartaoModal()" data-toggle="button" aria-pressed="false" autocomplete="off" style="margin: 0px 15px 0px 15px;">
                        Pagamento via Cartão
                    </button>
                    <button type="button" class="btn btn-primary" onclick="boletoModal()" data-toggle="button" aria-pressed="false" autocomplete="off" style="margin: 0px 15px 0px 15px;">
                        Pagamento via Boleto
                    </button>
                    <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js" data-button-label="Pagar com Mercado Pago" data-preference-id="<?php echo $response_smart; ?>">
                    </script>
                    <script>
                        function cartaoModal() {
                            //document.querySelector('#boleto').hidden = true;
                            document.getElementById("form-checkout").hidden = false;
                        }

                        function boletoModal() {
                            //document.querySelector('#boleto').hidden = false;
                            document.getElementById('form-checkout').hidden = true;
                        }
                    </script>
                </div>
            </div>
                <form id="form-checkout" class="row m-5">
                    <div class="text-center">
                        <div class="col-12 mb-3">
                            <div class="display-6">
                                <p>Checkout Transparente</p>
                                <img src="./img/mercadopago.png" alt="" style="width: 25%;">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 form-group mb-3">
                        <label>Número do cartão</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cardNumber" id="form-checkout__cardNumber" />
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-credit-card" id="icon-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 form-group mb-3">
                        <label>CVV</label>
                        <input type="text" class="form-control" name="securityCode" id="form-checkout__securityCode" />
                    </div>
                    <div class="col-12 col-md-4 form-group mb-3">
                        <label>Mês Vencimento</label>
                        <input type="text" class="form-control" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
                    </div>
                    <div class="col-12 col-md-4 form-group mb-3">
                        <label>Ano Vencimento</label>
                        <input type="text" class="form-control" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
                    </div>
                    <div class="col-12 col-md-4 form-group mb-3">
                        <label>Bandeira</label>
                        <select name="issuer" class="form-control" id="form-checkout__issuer">
                            <option>Selecionar</option>
                        </select>
                    </div>
                    <hr>
                    <div class="col-12 col-md-6 form-group mb-3">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName" />
                    </div>
                    <div class="col-12 col-md-6 form-group mb-3">
                        <label>E-mail</label>
                        <input type="email" name="cardholderEmail" class="form-control" id="form-checkout__cardholderEmail" />
                    </div>
                    <div class="col-12 col-md-5 form-group mb-3">
                        <label>Documento</label>
                        <select name="identificationType" class="form-control" id="form-checkout__identificationType">
                            <option>Selecionar</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-7 form-group mb-3">
                        <label>Número documento</label>
                        <input type="text" class="form-control" name="identificationNumber" id="form-checkout__identificationNumber" />
                    </div>
                    <hr>
                    <div class="col-12 col-md-5 form-group mb-3">
                        <label>Parcelas</label>
                        <select name="installments" class="form-control" id="form-checkout__installments">
                            <option>Selecionar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-10" id="form-checkout__submit">Pagar</button>
                </form>
                <div class="jumbotron" id="jumbotron" style="display: none;">
                    <p class="lead" id="message_status">TEXTO_MENSAGEM_STATUS_PAGAMENTO</p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" onclick="window.history.back()" role="button">Voltar para
                            inicio</a>
                    </p>
                </div>
                <div class="text-center">
                    <p style="margin-bottom: 0px">Acessar Repositório</p>
                    <a href="https://github.com/AndyTargino/MercadoPago-API">
                        <img src="./img/github.png" alt="" style="width: 10%;">
                    </a>
                </div>
                <!--<div id="boleto" class="text-center">
                    <div class="card-body">
                        <h5>Gerar Boleto para pagamento</h5>
                        <button type="submit" class="btn btn-primary w-10">Gerar Boleto</button>
                        <button class="btn btn-primary" type="button" disabled hidden>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Gerando...</span>
                        </button>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</body>
<link href="fontawesome-free/css/all.min.css" rel="stylesheet">
</html>
<script>
    const KEY = 'TEST-f424cfbd-32b8-4374-9c06-a2fada5b239e'
    const mp = new MercadoPago(KEY);
    (function(win, doc) {
        const cardForm = mp.cardForm({
            amount: "100.00", //valor do produto
            autoMount: true,
            form: {
                id: "form-checkout",
                cardholderName: {
                    id: "form-checkout__cardholderName",
                    placeholder: "Titular do cartão",
                },
                cardholderEmail: {
                    id: "form-checkout__cardholderEmail",
                    placeholder: "E-mail",
                },
                cardNumber: {
                    id: "form-checkout__cardNumber",
                    placeholder: "Número do cartão",
                },
                cardExpirationMonth: {
                    id: "form-checkout__cardExpirationMonth",
                    placeholder: "Mês de vencimento",
                },
                cardExpirationYear: {
                    id: "form-checkout__cardExpirationYear",
                    placeholder: "Ano de vencimento",
                },
                securityCode: {
                    id: "form-checkout__securityCode",
                    placeholder: "Código de segurança",
                },
                installments: {
                    id: "form-checkout__installments",
                    placeholder: "Parcelas",
                },
                identificationType: {
                    id: "form-checkout__identificationType",
                    placeholder: "Tipo de documento",
                },
                identificationNumber: {
                    id: "form-checkout__identificationNumber",
                    placeholder: "Número do documento",
                },
                issuer: {
                    id: "form-checkout__issuer",
                    placeholder: "Banco emissor",
                },
            },
            callbacks: {
                //can you see all callbacks in https://github.com/mercadopago/sdk-js
                onFormMounted: error => {
                    // checking if form exist
                    if (error) return console.warn("Form Mounted handling error: ", error);
                    console.log("Form mounted");
                },
                onPaymentMethodsReceived: (error, paymentMethods) => {
                    //checking card flag and placing corresponding logo
                    if (error) return console.warn('paymentMethods handling error: ', error)
                    // console.log('Payment Methods available: ', paymentMethods[0].thumbnail)
                    const span = doc.getElementById('basic-addon1')
                    const icon_card = doc.getElementById('icon-card')
                    const img = doc.createElement('img')
                    icon_card.style.display = "none"
                    img.src = paymentMethods[0].thumbnail
                    img.style.height = 30
                    img.className = "img-thumbnail"
                    span.appendChild(img)
                    // <img src="..." alt="..." class="img-thumbnail">
                },
                /*
                uncomment the line if you want to see how the card token is being encrypted
                */
                // onCardTokenReceived: (error, token) => {
                //     if (error) return console.warn('Token handling error: ', error)
                //     console.log('Token available: ', token)
                // },
                onSubmit: event => {
                    event.preventDefault();
                    const {
                        paymentMethodId: payment_method_id,
                        issuerId: issuer_id,
                        cardholderEmail: email,
                        amount,
                        token,
                        installments,
                        identificationNumber,
                        identificationType,
                    } = cardForm.getCardFormData();
                    // getCardFormData this function make encryption of form
                    /*
                    later we send the json with date of form to we back-end where will be process the informations
                    */
                    fetch("/controllers/paymentController.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            token, //number card + security code encryption, the function onCardTokenReceived do this ,
                            issuer_id, //id user payment (is randomic, don't horry)
                            payment_method_id, //card flag, don't worry the onPaymentMethodsReceived function will do it for you
                            transaction_amount: Number(amount), //value product
                            installments: Number(installments), //number of installments, amount of installments, data taken from the text box installments
                            description: "Mochila Tony Stark", //description prodct
                            payer: {
                                email,
                                identification: {
                                    type: identificationType,
                                    number: identificationNumber,
                                },
                            }, //payer information
                        }),
                    }).then((response) => {
                        // if the backend responds Ok we print a message on the screen
                        const message_status = doc.getElementById('message_status')
                        const jumbotron = doc.getElementById('jumbotron')
                        const form_checkout = doc.getElementById('form-checkout')
                        // stores response.id in the database
                        message_status.innerText = `Pagamento feito com sucesso`
                        form_checkout.style.display = 'none'
                        jumbotron.style.display = 'block'
                    }).catch((error) => {
                        console.error(error)
                        alert('Não foi possível completar sua solicitação')
                    });
                },
            },
        });
    })(window, document)
</script>