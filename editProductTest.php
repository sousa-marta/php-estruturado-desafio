<?php 

  include('variables.php');

  $productValueID = $_GET['productID'];
  $productID = $productValueID -1;
  var_dump($productID);
  exit;
 
  if(isset($_POST)){
    $productID = $_POST['id'];

    $editedProduct = $_POST;
    // var_dump($editedProduct);

    //Alterando dados que foram alterados:
    foreach ($_SESSION['products'][$productID] as $key => $value){
      if($key!="img"){
        if($value != $editedProduct[$key]){
          $_SESSION['products'][$productID][$key] = $editedProduct[$key];
        }
      }
    }
  }


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
  <!-- Formulário de Alteração de Produtos (post para a própria página)-->
  <div class="row justify-content-center">
    <form class="col-4 form-input" method="post" action="" enctype="multipart/form-data">
      <!-- Informações para salvar o ID do produto: -->
      <input type="hidden" name="id" value="<?= $productID ?>">
      <h1>Editar Produto</h1>
      <div class="form-group">
        <label for="productName">Nome</label>
        <input type="text" name="name" class="form-control" id="productName" required value="<?= $productArray['name'] ?>">
      </div>
      <div class="form-group">
        <label for="productCategory">Categoria</label>
        <!-- Categoria de produtos dinâmica -->
        <select class="form-control" name="category" id="productCategory">
          <?php
            foreach ($_SESSION['productCategoryList'] as $category) { ?>
            <option value="<?= $category ?>"><?= $category ?></option>    
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="productDescription">Descrição</label>
        <textarea class="form-control" name="description" id="productDescription" cols="30" rows="3" value="<?= $productArray['description'] ?>" required><?= $productArray['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantidade</label>
        <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Insira a quantidade de produtos em estoque" value="<?= $productArray['quantity'] ?>" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Preço</label>
        <input type="number" name="price" id="productPrice" class="form-control" value="<?= $productArray['price'] ?>" required>
      </div>
      <div class="form-group row">
        <label for="productImage">Foto do Produto</label>
        <img src="<?= $productArray['image'] ?>" alt="" class="col-6">
        <input type="file" name="img" id="productImage" value="<?= $productArray['image'] ?>">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</main>

</body>
</html>