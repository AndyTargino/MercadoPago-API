<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Transparente | Mercado Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="card w-75 justify-content-center">
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <form class="text-center border border-light p-5">
                        <div class="form-row">
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>Valor: Apenas numeros ex: R$1,00 -> 1.00</label>
                                <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName" />
                            </div>
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>Nome proprietario cartão</label>
                                <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName" />
                            </div>
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>E-mail</label>
                                <input type="email" name="cardholderEmail" class="form-control" id="form-checkout__cardholderEmail" />
                            </div>
                        </div>
                        <div class="form-row">
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
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>Número do cartão</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cardNumber" id="form-checkout__cardNumber" />
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-credit-card" id="icon-card"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Mes</label>
                                <input type="text" class="form-control" id="form-checkout__cardExpirationMonth">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Ano</label>
                                <input type="text" class="form-control" id="form-checkout__cardExpirationYear">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>Bandeira</label>
                                <select name="issuer" class="form-control" id="form-checkout__issuer">
                                    <option>Selecionar</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 form-group mb-3">
                                <label>Parcelas</label>
                                <select name="installments" class="form-control" id="form-checkout__installments">
                                    <option>Selecionar</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>