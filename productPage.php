<?php 
  require("variables.php"); 
  
  //Checando se está recebendo a informação do _GET corretamente:
  // var_dump($_GET);
  // var_dump($_SESSION['products']);

  //Pegando o valor do ID do produto recebido:
  $productID = $_GET['productID'];
  // var_dump($_GET);

  //Função para pegar a array respectiva ao ID recebido via GET:
  function getProduct($productID){
    foreach ($_SESSION['products'] as $product) {
      if($product['id'] == $productID){
        return $product;
      }
    }
  }

  //Rodando a função e recebendo a array:
  $product = getProduct($productID);
  // var_dump($product);


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
<body>
  <main class="container product-page">

    <!-- Botão para voltar para a lista de produtos -->
    <div>
      <a href="index.php" class="btn btn-light mt-3">&#8678 Voltar para a lista de produtos</a>
    </div>
    
    <div class="p-4">
      <div class="row justify-content-between">
        
        <!-- Imagem do Produto -->
        <section class="col-4">
          <img src="<?= $product['image']; ?>" alt=""  class="product-image mt-3">
        </section>

        <!-- Informações Sobre o Produto -->
        <section class="col-8 d-flex flex-column">
          <h1><?= $product['name']; ?></h1>
          <div class="py-3">
            <p>Categoria</p>
            <h5><?= $product['category']; ?></h5>
          </div>
          <div class="py-3">
            <p>Descrição</p>
            <h5><?= $product['description']; ?></h5>
          </div>
          <div class="row py-3">
            <div class="col">
              <p>Quantidade em Estoque</p>
              <h5><?= $product['quantity'].' unidades'; ?></h5>
            </div>
            <div class="col">
              <p>Preço</p>
              <h5><?= 'R$ '.$product['price']; ?></h5>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <a href="editProduct.php?productID=<?= $productID; ?>" class="btn btn-primary">Editar</a>
            <a href="deleteProduct.php?productID=<?= $productID; ?>" class="btn btn-danger ml-5">Excluir Produto</a>
          </div>
        </section>
      </div>
    </div>
  </main>
</body>
</html>