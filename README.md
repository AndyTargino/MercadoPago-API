# MercadoPago-API
### API desenvolvida utilizando o repositório do [MercadoPago](https://www.mercadopago.com.br/developers/pt) com facilidade para implementação em sistemas PHP puro.




## Funcionalidades disponiveis:
##### 1 - Checkout Transparente
##### 2 - Gerar Boleto para pagamento
##### 3 - Requisições AJAX/fetch
##### 4 - Pagamento Smart



### 1 - Checkout Transparente:
<img src="https://user-images.githubusercontent.com/84283346/168401847-cfc76c42-4a25-4033-88f2-7ae58acee40c.png" width="500" height="450"/>

<div>
  <p>Checkout Transparente consiste em implementar o sistema de pagamento</p>
  <p>no seu site sem ter que fazer uma comunicação direta com o mercado pago, </p>
  <p>para fins de facilitar o desenvolvimento de aplicações, já está sendo </p>
  <p>disponibilizado um modelo funcional de pagamento por checkout transparente.</p>
</div>



### 2 - Gerar Boleto:
<img src="https://user-images.githubusercontent.com/84283346/168483139-be5f83c3-2d1d-427c-926f-a2a382d4f5f5.png" width="500" height="350"/>
<div>
  <p>A funcionalidade de gerar boletos para pagamento também está implementada no sistema.</p>
  <p>Através do pagamendo via boleto você pode Gerar boleto e encaminhar</p>
  <p>para o usuario o link com o documento para pagamento.</p>
  <b>PS: Os pagamentos via boleto por padrão tem até 3 dias para ser debitado.</b>
</div>



### 3 - Pagamento Smart:
<img src="https://user-images.githubusercontent.com/84283346/168482955-4bdf12e9-c2fe-47eb-bf7a-f221871ac71a.png" width="500" height="320"/>
<div>
  <p>O pagamento smart consiste em um modal que se conecta diretamente com o sistema MercadoPago.</p>
  <p>Este modelo de pagamento é prático e rápido, porém é mais dificil obter seus dados para salvar em um banco de dados.</p>
  <p>implementar o pagamento smart é interessante quando o sistema requer</p>
  <p>uma solução para pagamentos via pix, debito, caixa, entre outras opções.</p>
  <b>PS: O pagamento via pix já está disponivel mas ainda não foi implementado</b>
</div>

## instalação:
Todas bibliotecas já estão sendo chamadas pela sua vendor, execute o comando dentro de sua pasta lib:

    composer update

  





