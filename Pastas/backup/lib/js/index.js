//your public key can be found in https://www.mercadopago.com.br/developers/pt/guides/online-payments/checkout-pro/test-integration
const KEY = 'TEST-f424cfbd-32b8-4374-9c06-a2fada5b239e'
//the new MercadoPago is variable global imported from https://sdk.mercadopago.com/js/v2
const mp = new MercadoPago(KEY);
(function (win, doc) {
    // console.log(mp);
    const cardForm = mp.cardForm({
        amount: "1.00",//value product
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
                // console.log("Form mounted");
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
             onCardTokenReceived: (error, token) => {
                 if (error) return console.warn('Token handling error: ', error)
                console.log('Token available: ', token)
            },
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
                        },//payer information
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
            onFetching: (resource) => {
                // console.log("Fetching resource: ", resource);
                // Animate progress bar
                const progressBar = document.querySelector(".progress-bar");
                progressBar.removeAttribute("value");

                return () => {
                    progressBar.setAttribute("value", "0");
                };
            },
        },
    });
})(window, document)
