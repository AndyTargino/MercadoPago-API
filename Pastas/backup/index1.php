<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Pagamento Mercado Pago</title>
</head>

<body>
    <nav class="navbar navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="getbootstrap" width="30" height="24">
            </a>
        </div>
    </nav>
    <div class="container">
        <form id="form-checkout" class="row m-5">
            <div class="col-12 mb-3">
                <div class="display-6">Mochila Tony Stark <div class="text-secondary">R$ 100.00</div>
                </div>
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Número do cartão</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="cardNumber" id="form-checkout__cardNumber" />
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-credit-card" id="icon-card"></i>
                    </span>
                </div>
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Mês expira cartão</label>
                <input type="text" class="form-control" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Ano expira cartão</label>
                <input type="text" class="form-control" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Nome proprietario cartão</label>
                <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>E-mail</label>
                <input type="email" name="cardholderEmail" class="form-control" id="form-checkout__cardholderEmail" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Código de segurança</label>
                <input type="text" class="form-control" name="securityCode" id="form-checkout__securityCode" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Bandeira</label>
                <select name="issuer" class="form-control" id="form-checkout__issuer">
                    <option>Selecionar</option>
                </select>
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Documento</label>
                <select name="identificationType" class="form-control" id="form-checkout__identificationType">
                    <option>Selecionar</option>
                </select>
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Número documento</label>
                <input type="text" class="form-control" name="identificationNumber" id="form-checkout__identificationNumber" />
            </div>
            <div class="col-12 col-md-6 form-group mb-3">
                <label>Parcelas</label>
                <select name="installments" class="form-control" id="form-checkout__installments">
                    <option>Selecionar</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary w-100" id="form-checkout__submit">Pagar</button>
            </div>
            <div class="col-12 mb-3">
                <div class="progress">
                    <progress value="0" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Carregando...</progress>
                </div>
            </div>
        </form>
        <div class="jumbotron" id="jumbotron" style="display: none;">
            <h1 class="display-4">e-Shopee</h1>
            <p class="lead" id="message_status">TEXTO_MENSAGEM_STATUS_PAGAMENTO</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="https://eshopee.com.br" role="button">Voltar para inicio</a>
            </p>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="lib/js/index.js"></script>
</body>
<link href="fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>