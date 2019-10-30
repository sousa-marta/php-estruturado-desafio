<?php
  //Incluindo variáveis.php que já contém session_start:
  require("variables.php");

  // Para resetar a session products
  // unset($_SESSION['products']);
  // exit;

  // var_dump($_SESSION);
  // var_dump($_SESSION['products']);


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
  <main class="container-fluid">
    <div class="row d-flex justify-content-center">

      <!-- Tabela de Produtos Cadastrados  -->
      <div class="col-7 products-table mt-5 mx-3">
        <h2>Todos os Produtos Cadastrados</h2>
         <?php if(isset($_SESSION['products'])){ ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preço</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($_SESSION['products'] as $row){ ?>
              <tr>
                <td><a href="productPage.php?productID=<?= $row['id']; ?>"><?= $row["name"]; ?></a></td>
                <td><?= $row["category"]; ?></td>
                <td><?= 'R$ '.$row["price"]; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table> 
        <?php } ?>
      </div>

      <!-- Formulário de Cadastro de Produtos -->
      <form class="col-4 form-input" method="post" action="" enctype="multipart/form-data">
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
              foreach ($_SESSION['productCategoryList'] as $category) { ?>
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