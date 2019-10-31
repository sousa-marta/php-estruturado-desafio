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

  //pegar via get os novos valores enviados pela pessoa. parte de mover fotos se repete

// Criando função para acrescentar novos produtos numa session. Entra com 
  function addProduct($productName,$productCategory,$productDescription,$productQuantity,$productPrice,$imgPath){
    //Se ainda não teve nenhum produto adicionado:
    if(!isset($_SESSION['products'])){
      $_SESSION['products'] = [];

      //Criando primeiro ID da lista:
      $id = 1;

      $_SESSION['products'][] = ['id' => $id, 'name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' => $productQuantity, 'price' => $productPrice, 'image' => $imgPath];

      //Validação para verificar se o arquivo foi adicionado corretamente:
      if(!$_SESSION['products']){
        return "Não foi possível cadastrar o produto corretamente";
      }else {
        return "O produto foi adicionado no cadastro corretamente";
      }

    //Se já tem um produto adicionado:
    }else {
      //Pegando posição na array do último ID (conta quantos elementos tem no array e descresce de 1 para pegar a posição real):
      $idLastPosition = count($_SESSION['products'])-1; 

      //Pega o valor do ID da última posição e acrescenta um para colocar na array produtos:
      $idLast = $_SESSION['products'][$idLastPosition]['id']+1;

      $_SESSION['products'][] = ['id' => $idLast, 'name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' => $productQuantity, 'price' => $productPrice, 'image' => $imgPath];
      //Validação para verificar se o arquivo foi adicionado corretamente:
      if(!$_SESSION['products']){
        return "Não foi possível cadastrar o produto corretamente";
      }else {
        return "O produto foi adicionado ao cadastro corretamente";
        // header("Location: index.php");
      }
    }
  }
    
  //CADASTRO DE PRODUTO:
  if($_POST){
    //Movendo imagem para pasta do projeto:
    $imgName = $_FILES['productImage']['name'];
    $tmpPath = $_FILES['productImage']['tmp_name'];
    $imgPath = "productsImgs/".$imgName;
    // $imgPath = dirname(__FILE__)."/productsImgs/".$imgName;

    $moveFile = move_uploaded_file($tmpPath, $imgPath);

    //Chamando a função para salvar o arquivo na session:
    echo addProduct($productName,$productCategory,$productDescription,$productQuantity,$productPrice,$imgPath);
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
        <input type="text" name="productName" class="form-control" id="productName" required value="<?= $productArray['name'] ?>">
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
        <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="3" value="<?= $productArray['description'] ?>" required><?= $productArray['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="productQuantity">Quantidade</label>
        <input type="number" name="productQuantity" class="form-control" id="productQuantity" placeholder="Insira a quantidade de produtos em estoque" value="<?= $productArray['quantity'] ?>" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Preço</label>
        <input type="number" name="productPrice" id="productPrice" class="form-control" value="<?= $productArray['price'] ?>" required>
      </div>
      <div class="form-group row">
        <label for="productImage">Foto do Produto</label>
        <img src="<?= $productArray['image'] ?>" alt="" class="col-6">
        <input type="file" name="productImage" id="productImage" value="<?= $productArray['image'] ?>">
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</main>

</body>
</html>