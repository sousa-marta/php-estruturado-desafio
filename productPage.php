<?php 
  require("variables.php"); 
  
  //Checando se está recebendo a informação do _GET corretamente:
  // var_dump($_GET);
  var_dump($_SESSION['products']);

  //Pegando o valor do ID do produto recebido:
  $productID = $_GET['productID'];
  

  // ESTÁ RETORNANDO FALSE.... :( ------------------>

  //Função para pegar a array respectiva ao ID recebido via GET:
  function productGet($productID){
    foreach ($_SESSION['products'] as $product) {
      if($product['id'] == $productID){
        return $product;
      }else{
        return false;
      }
    }
  }

  //Rodando a função e recebendo a array:
  $product = productGet($productID);
  var_dump($product);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $product['name'] ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="product-page">
  <main class="container-fluid">
    <div>
      <a href="index.php">Voltar para a lista de produtos</a>
    </div>
    <div>
      <div class="row justify-content-between">
        <section class="col-4">
          <img src="productsImgs/calca-de-couro-ecologico-preta-colcci_285250_600_1.jpg" alt=""  class="product-image">
        </section>
        <section class="col-8 d-flex flex-column align-items-start">
          <h1>Nome do produto</h1>
          <div class="py-3">
            <p>Categoria</p>
            <h5>#Categoria do Produto</h5>
          </div>
          <div class="py-3">
            <p>Descrição</p>
            <h5>#Descrição do Produto</h5>
          </div>
          <div class="row no-gutters justify-content-between py-3">
            <div>
              <p>Quantidade em Estoque</p>
              <h5>#Qtd</h5>
            </div>
            <div>
              <p>Preço</p>
              <h5>#R$</h5>
            </div>
          </div>
          <div>
            <a href="#">Excluir Produto</a>
            <br>
            
            <a href="#">Editar</a>
          </div>
        </section>
      </div>
    </div>
  </main>
</body>
</html>