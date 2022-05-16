<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Pagamento Mercado Pago</title>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    /*use flexbox to centered element*/
    div.wrapper {
        width: 100%;
        min-height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h1.brand {
        font-size: 40px;
    }

    h1.brand span:nth-child(1) {
        background-color: transparent;
        color: #0074b4;
    }

    h1.brand span:nth-child(2) {
        background-color: #0074b4;
        color: #f3f2ef;
        padding: 0px 6px;
        margin-left: -6px;
        border-radius: 2px;
    }

    div.loading-bar {
        width: 100px;
        height: 2px;
        background-color: #d6cec2;
        border-radius: 10px;
        margin-top: 25px;
        overflow: hidden;
        position: relative;
    }

    div.loading-bar::after {
        content: '';
        width: 50px;
        height: 2px;
        position: absolute;
        background-color: #0074b4;
        transform: translateX(-20px);
        animation: loop 2s ease infinite;
    }

    @keyframes loop {

        0%,
        100% {
            transform: translateX(-28px);
        }

        50% {
            transform: translateX(78px)
        }
    }
</style>

<body>
    <div class="d-flex justify-content-center">
        <div class="card col-md-9 col-lg-6" style="margin-top: 5%;">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" onclick="cartaoModal()" data-toggle="button" aria-pressed="false" autocomplete="off" style="margin: 0px 15px 0px 15px;">
                        Cartão
                    </button>
                    <button type="button" class="btn btn-primary" onclick="boletoModal()" data-toggle="button" aria-pressed="false" autocomplete="off" style="margin: 0px 15px 0px 15px;">
                        Boleto
                    </button>
                    <button type="button" class="btn btn-primary" onclick="pixModal()" data-toggle="button" aria-pressed="false" autocomplete="off" style="margin: 0px 15px 0px 15px;">
                        PIX
                    </button>
                    <div id="smartPayment"></div>
                    <script>
                        function cartaoModal() {
                            document.getElementById('boleto').hidden = true;
                            document.getElementById('pix').hidden = true;
                            document.getElementById("form-checkout").hidden = false;
                        }

                        function boletoModal() {
                            document.getElementById('boleto').hidden = false;
                            document.getElementById('pix').hidden = true;
                            document.getElementById('form-checkout').hidden = true;
                        }

                        function pixModal() {
                            document.getElementById('boleto').hidden = true;
                            document.getElementById('pix').hidden = false;
                            document.getElementById('form-checkout').hidden = true;
                            gerarPix();
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
                <button type="submit" class="btn btn-primary w-100" id="form-checkout__submit">Pagar</button>
            </form>
            <div id="boleto" class="text-center" hidden>
                <div class="card-body">
                    <h5>Gerar Boleto para pagamento</h5>
                    <img src="./img/boleto.png" style="width: 8%;">
                    <button id="boleto_pay" onclick="gerarBoleto()" class="btn btn-primary w-10">
                        <span id="boleto_generate_true">Gerar Boleto</span>
                    </button>
                </div>
            </div>
            <div id="pix" class="text-center" hidden>
                <div class="card-body">
                    <h5>Pix para pagamento</h5>
                    <div class="wrapper" id="loadingPix">
                        <h1 class="brand">
                            <span>Gerando PIX</span>
                        </h1>
                        <div class="loading-bar"></div>
                    </div>
                    <div id="qrcode"></div>
                </div>
            </div>
            <div class="text-center">
                <p style="margin-bottom: 0px">Acessar Repositório</p>
                <a href="https://github.com/AndyTargino/MercadoPago-API">
                    <img src="./img/github.png" style="width: 10%;">
                </a>
            </div>
        </div>
    </div>

    <button id="button_click" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" hidden></button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="mensagens_sistema_body" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</body>

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
                //você pode ver todos os retornos de chamada em https://github.com/mercadopago/sdk-js
                onFormMounted: error => {
                    //verificando se o formulário existe
                    if (error) return console.warn("Form Mounted handling error: ", error);
                    //console.log("Form mounted");
                },
                onPaymentMethodsReceived: (error, paymentMethods) => {
                    //verificando a bandeira do cartão e colocando o logotipo correspondente
                    if (error) return console.warn('paymentMethods handling error: ', error)
                    const span = doc.getElementById('basic-addon1')
                    const icon_card = doc.getElementById('icon-card')
                    const img = doc.createElement('img')
                    icon_card.style.display = "none"
                    img.src = paymentMethods[0].thumbnail
                    img.style.height = 30
                    img.className = "img-thumbnail"
                    span.appendChild(img)
                },
                /*
                descomente a linha se quiser ver como o token do cartão está sendo criptografado
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
                    // getCardFormData faz a criptografia do formulário
                    /*
                    posteriormente enviamos o json com data do formulário para o back-end onde serão processadas as informações
                    */
                    fetch("/controllers/cardController.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                token, //cartão de número + criptografia de código de segurança, a função onCardTokenReceived faz isso ,
                                issuer_id, //id do pagamento do usuário  (é aleatório, não se preocupe)
                                payment_method_id, //bandeira do cartão, não se preocupe, a função onPaymentMethodsReceived fará isso por você
                                transaction_amount: Number(amount), //Valor do produto
                                installments: Number(installments), //número de parcelas, quantidade de parcelas, dados retirados da caixa de texto parcelas
                                description: "Produro 001", //Descrição do produto
                                payer: {
                                    email,
                                    identification: {
                                        type: identificationType,
                                        number: identificationNumber,
                                    },
                                }, //Informações de pagamento
                            }),
                        }).then(response => response.text())
                        .then((result) => {
                            response = JSON.parse(result)
                            console.log(response.id)
                            document.getElementById('mensagens_sistema_body').innerHTML = response.mensagem
                            document.getElementById('button_click').click()
                        }).catch(error => console.log('error', error));
                },
            },
        });
    })(window, document)
</script>
<script>
    function gerarBoleto() {

        //Dados Para Boleto
        var email = "teste@gmail.com";
        var first_name = "Joao";
        var last_name = "Silva";
        var identificationType = 'cpf'
        var identificationNumber = '19063678096';
        var amount = "5.00";

        var botaoBoleto = document.getElementById('boleto_pay')
        botaoBoleto.disabled = true
        botaoBoleto.innerHTML = "Gerando Boleto..."
        fetch("/controllers/boletoController.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    transaction_amount: Number(amount),
                    description: "Pesquisa 001",
                    payer: {
                        email,
                        first_name,
                        last_name,
                        identification: {
                            type: identificationType,
                            number: identificationNumber,
                        },
                    },
                }),
            })
            .then(response => response.text())
            .then((result) => {
                response = JSON.parse(result)
                document.getElementById('mensagens_sistema_body').innerHTML = response.mensagem
                document.getElementById('button_click').click()
                botaoBoleto.disabled = false
                botaoBoleto.innerHTML = "Gerar Boleto"
            })
            .catch(error => console.log('error', error));
    }
</script>
<script>
    //Criar botao de pagamento Smart/checkout Pro
    var formdata = new FormData();
    formdata.append("amount", "1");
    formdata.append("produto", "Produto 001");
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    fetch("https://devspace.com/controllers/smartController.php", requestOptions)
        .then(response => response.text())
        .then((result) => {
            var my_awesome_script = document.createElement('script');
            my_awesome_script.setAttribute('src', 'https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js');
            my_awesome_script.setAttribute('data-button-label', 'Pagar com Mercado Pago');
            my_awesome_script.setAttribute('data-preference-id', result)
            document.getElementById('smartPayment').appendChild(my_awesome_script);
        })
        .catch(error => console.log('error', error));
</script>
<script>
    function gerarPix() {

        var formdata = new FormData();
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("https://devspace.com/controllers/pixController.php", requestOptions)
            .then(response => response.text())
            .then((result) => {

                document.getElementById('loadingPix').hidden = true;
                var pix = document.getElementById('qrcode')
                pix.innerHTML = result;
            })
            .catch(error => console.log('error', error));
    }
</script>