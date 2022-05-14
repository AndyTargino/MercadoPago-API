# MercadoPago-API
### API desenvolvida utilizando o repositório do [MercadoPago](https://www.mercadopago.com.br/developers/pt) com facilidade para implementação em sistemas PHP puro.




## Funcionalidades disponiveis:
##### 1 - Checkout Transparente
##### 2 - Gerar Boleto para pagamento
##### 3 - Requisições AJAX/fetch
##### 4 - Pagamento Smart

### 1 - Checkout Transparente:
<img src="https://user-images.githubusercontent.com/84283346/168401847-cfc76c42-4a25-4033-88f2-7ae58acee40c.png" width="600" height="500"/>

<div>
  <p>Checkout Transparente consiste em implementar o sistema de pagamento</p>
  <p>no seu site sem ter que fazer uma comunicação direta com o mercado pago, </p>
  <p>para fins de facilitar o desenvolvimento de aplicações, já está sendo </p>
  <p>disponibilizado um modelo funcional de pagamento por checkout transparente.</p>
</div>

### 2 - Gerar Boleto:
<div>
  <p>A funcionalidade de gerar boletos para pagamento também está implementada no sistema.</p>
  <p>Através do pagamendo via boleto você pode Gerar boleto e encaminhar</p>
  <p>para o usuario o link com o documento para pagamento.</p>
  <p>PS: Os pagamentos via boleto por padrão tem até 3 dias para ser debitado.</p>
</div>

### 2 - Pagamento Smart:
<div>
  <p>O pagamento smart consiste em um modal que se conecta diretamente com o sistema MercadoPago.</p>
  <p>Este modelo de pagamento é prático e rápido, porém é mais dificil obter seus dados para salvar em um banco de dados.</p>
  <p>implementar o pagamento smart é interessante de ser implementado quando o cliente quer</p>
  <p>uma solução para pagamentos via pix, debito, caixa, entre outras opções.</p>
</div>

<p style="color: red">O pagamento via pix já pode ser implementado neste código e será adicionado posteriormente.</p>


## instalação:
Todas bibliotecas já estão sendo chamadas pela sua vendor, execute o comando dentro de sua pasta lib:

    composer update

  





