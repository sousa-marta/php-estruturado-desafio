<?php 

  include('variables.php');

  //Pegando o valor do ID do produto recebido:
  $productID = $_GET['productID'];
  // var_dump($_GET);

  //Pegando array de lista de produtos da Session:
  $products = $_SESSION['products'];
  // var_dump($products);

  //Pegando array do produto:
  function getArrayProduct ($productID,$products){
    foreach ($products as $product) {
      if ($productID == $product['id']) {
        return $product;
      }
    }
  }
  
  $productArray = getArrayProduct($productID,$products);
  var_dump($productArray);
  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Produto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  
<main>
  <!-- Formulário de Alteração de Produtos -->
  <div class="row justify-content-center">
    <form class="col-4 form-input" method="post" action="" enctype="multipart/form-data">
      <h1>Editar Produto</h1>
      <div class="form-group">
        <label for="productName">Nome</label>
        <input type="text" name="productName" class="form-control" id="productName" value="<?= lindo ?>">
      </div>
      <div class="form-group">
        <label for="productCategory">Categoria</label>
        <!-- Categoria de produtos dinâmica -->
        <select class="form-control" name="productCategory" id="productCategory">
          <option value="select" selected disabled>Selecione uma categoria</option>
          <?php
            foreach ($_SESSION['productCategoryList'] as $category) { ?>
            <option value="<?= $category ?>"><?= $category ?></option>    
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="productDescription">Descrição</label>
        <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantidade</label>
        <input type="number" name="productQuantity" class="form-control" id="productQuantity" placeholder="Insira a quantidade de produtos em estoque" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Preço</label>
        <input type="number" name="productPrice" id="productPrice" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="productImage">Foto do Produto</label>
        <input type="file" name="productImage" id="productImage" required>
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</main>

</body>
</html>