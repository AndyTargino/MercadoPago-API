# MercadoPago-API
### API desenvolvida utilizando o repositório do [MercadoPago](https://www.mercadopago.com.br/developers/pt) com facilidade para implementação em sistemas PHP puro.


<br><br><br>

## Funcionalidades disponiveis:
##### 1 - Checkout Transparente
##### 2 - Gerar Boleto para pagamento
##### 3 - Requisições AJAX/fetch
##### 4 - Pagamento Smart
##### 5 - Pagamento via PIX


<br><br><hr>
### 1 - Checkout Transparente:


<img src="https://user-images.githubusercontent.com/84283346/168483862-83ce686a-13b1-4123-b6a9-7616c658a369.png" width="400" height="340" border="1px solid red"/>

<div>
  <p>Checkout Transparente consiste em implementar o sistema de pagamento</p>
  <p>no seu site sem ter que fazer uma comunicação direta com o mercado pago, </p>
  <p>para fins de facilitar o desenvolvimento de aplicações, já está sendo </p>
  <p>disponibilizado um modelo funcional de pagamento por checkout transparente.</p>
</div>


<br><hr>
### 2 - Gerar Boleto:
<img src="https://user-images.githubusercontent.com/84283346/168499279-bc387742-5a65-4743-87f4-5721790628b4.png" width="440" height="300"/>


<div>
  <p>A funcionalidade de gerar boletos para pagamento também está implementada no sistema.</p>
  <p>Através do pagamendo via boleto você pode Gerar boleto e encaminhar</p>
  <p>para o usuario o link com o documento para pagamento.</p>
  <b>PS: Os pagamentos via boleto por padrão tem até 3 dias para ser debitado.</b>
</div>


<br><hr>
### 3 - Pagamento Smart:
<img src="https://user-images.githubusercontent.com/84283346/168482955-4bdf12e9-c2fe-47eb-bf7a-f221871ac71a.png" width="500" height="320"/>
<div>
  <p>O pagamento smart consiste em um modal que se conecta diretamente com o sistema MercadoPago.</p>
  <p>Este modelo de pagamento é prático e rápido, porém é mais dificil obter seus dados para salvar em um banco de dados.</p>
  <p>implementar o pagamento smart é interessante quando o sistema requer</p>
  <p>uma solução para pagamentos via pix, debito, caixa, entre outras opções.</p>
  <b>PS: O pagamento via pix já está disponivel.</b>
</div>

<br><hr>
### 4 - Pagamento PIX:
<img src="https://user-images.githubusercontent.com/84283346/168499614-7fb30b1b-3767-4024-a22c-d7cd1d9a1a73.png" width="500" height="250"/>
<div>
  <p>O pagamento via PIX é feito baseado numa imagem base64 com todos os dados de pagamento</p>
  <p>gerador pela API com os dados de pagamento e valor total da compra</p>
</div>

## instalação:
Todas bibliotecas já estão sendo chamadas pela sua vendor, execute o comando dentro de sua pasta lib:

    composer update

  





