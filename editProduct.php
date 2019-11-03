<?php

require_once("config/functions.php");

//Pegando o valor do ID do produto recebido:
$id = $_GET['id'];

//Array de produtos do ID recebido atual:
$currentProduct = $_SESSION['products'][$id];

if($_POST) {
  //Pegando o valor do ID do produto recebido:
  $id = $_GET['id'];

  //Array de produtos do ID recebido atual:
  $currentProduct = $_SESSION['products'][$id];

  //Array de produtos recebido via GET:
  $editedProduct = $_POST;

  //Executando a função de alteração de produto
  editProduct($currentProduct,$editedProduct,$id);

  // Salvando nova foto:
  if($_FILES){
    //Movendo imagem para pasta do projeto:
    $imgName = $_FILES['image']['name'];
    $tmpPath = $_FILES['image']['tmp_name'];
    $imgPath = "productsImgs/".$imgName;

    //Se conseguir salvar o novo arquivo na pasta do projeto, deleta a imagem antiga e altera o caminho:
    if($moveFile = move_uploaded_file($tmpPath, $imgPath)){
      unlink($_SESSION['products'][$id]['image']);
      $_SESSION['products'][$id]['image'] = $imgPath;
    }else {
      echo "Não foi possível salvar a imagem";
      exit;
    }
  }

  // Voltar para Index
  header("Location: index.php");
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
      <h1>Editar Produto</h1>
      <div class="form-group">
        <label for="productName">Nome</label>
        <input type="text" name="name" class="form-control" id="productName" required value="<?= $currentProduct['name'] ?>">
      </div>
      <div class="form-group">
        <label for="productCategory">Categoria</label>
        <!-- Categoria de produtos dinâmica -->
        <select class="form-control" name="category" id="productCategory">
          <?php foreach ($_SESSION['productCategoryList'] as $category) {
              if ($currentProduct['category'] == $category){ ?>
                <option value="<?= $category; ?>" selected>
                  <?= $category; ?>
                </option>
              <?php }else { ?>
                <option value="<?= $category ?>">
                  <?= $category; ?>
                </option> 
              <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="productDescription">Descrição</label>
        <textarea class="form-control" name="description" id="productDescription" cols="30" rows="3" value="<?= $currentProduct['description'] ?>" required><?= $currentProduct['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantidade</label>
        <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Insira a quantidade de produtos em estoque" value="<?= $currentProduct['quantity'] ?>" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Preço</label>
        <input type="number" name="price" id="productPrice" class="form-control" value="<?= $currentProduct['price'] ?>" required>
      </div>
      <div class="form-group row">
        <label for="productImage">Foto do Produto</label>
        <img src="<?= $currentProduct['image'] ?>" alt="" class="col-6">
        <input type="file" name="image" id="productImage" value="<?= $currentProduct['image'] ?>">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</main>

</body>
</html>