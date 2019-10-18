<!-- Backlog
  1. FAZER VALIDAÇÕES DO ARQUIVO PARA TER CERTEZA QUE É FOTO
  2. Deixar categoria de produtos dinâmica em ordem alfabetica
  3. Required no select? -->

  
<?php
  include("variables.php");
  include("validations.php");

  // Criando função para acrescentar novos produtos em um arquivo Json:
  function addProduct($productName,$productCategory,$productDescription,$productQuantity,$productPrice,$productImage){
    $fileName = "products.json";

    //Verificando se arquivo já existe ou precisa ser criado:
    if(file_exists($fileName)){

      //Adicionando um novo produto na array que estava dentro do produto:
      $products[] = ["name" => $productName, "category" => $productCategory, "description" => $productDescription, "quantity" => $productQuantity, "price" => $productPrice, "image" => $productImage];

      //Transformando array em json:
      $jsonEncoded = json_encode($products);
      //Salvando o json dentro de um arquivo. FILE_APPEND para acrescentar ao final do arquivo.
      $jsonAdd = file_put_contents($fileName,$jsonEncoded,FILE_APPEND);

      if($jsonAdd){
        return "O produto foi adicionado no cadastro corretamente";
      }else {
        return "Não foi possível cadastrar o produto corretamente";
      }

    }else {
      //Se já exisir, acrescentar o último produto cadastrado numa array:
      $products = [
        ["name" => $productName, "category" => $productCategory, "description" => $productDescription, "quantity" => $productQuantity, "price" => $productPrice, "image" => $productImage]
      ];

      //Transformando essa array em arquivo .json:
      $jsonEncoded = json_encode($products);
      //Salvando os dados desse json dentro do arquivo. Se o arquivo não existir, cria. :
      $jsonAdd = file_put_contents($fileName,$jsonEncoded);

      //Validação para verificar se o arquivo foi adicionado corretamente:
      if($jsonAdd){
        return "O produto foi adicionado no cadastro corretamente";
      }else {
        return "Não foi possível cadastrar o produto corretamente";
      }
    }
  }

  if($_POST){
    //Movendo imagem para pasta do projeto:
    $imgName = $_FILES["productImage"]["name"];
    $tmpPath = $_FILES["productImage"]["tmp_name"];
    $imgPath = dirname(__FILE__)."/productsImgs/".$imgName;

    $moveFile = move_uploaded_file($tmpPath, $imgPath);

    //Chamando a função para salvar o arquivo no .json:
    echo addProduct($productName,$productCategory,$productDescription,$productQuantity,$productPrice,$imgPath);

  }


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de Produtos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main class="container">
    <div class="row">
      <!-- Lista de Produtos Cadastrados  -->
      <div class="col-7">
        <h2>Todos os Produtos</h2>
      </div>

      <!-- Formulário de Cadastro de Produtos -->
      <form class="col-5 form-input" method="post" action="" enctype="multipart/form-data">
        <h1>Cadastrar Produtos</h1>
        <div class="form-group">
          <label for="productName">Nome</label>
          <input type="text" name="productName" class="form-control" id="productName" required placeholder="Insira o nome do produto">
        </div>
        <div class="form-group">
          <label for="productCategory">Categoria</label>
          <!-- Categoria de produtos dinâmica -->
          <select class="form-control" name="productCategory" id="productCategory">
            <option value="select" selected disabled>Selecione uma categoria</option>
            <?php
              foreach ($productCategoryList as $category) { ?>
              <option value="<?= $category ?>"><?= $category ?></option>    
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="productDescription">Descrição</label>
          <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="3"
            required></textarea>
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