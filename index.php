<?php
  //Incluindo functions.php que inclue variáveis.php que já contém session_start:
  require_once("config/functions.php");
 
  //CADASTRO DE PRODUTO:
  if($_POST){
    //Movendo imagem para pasta do projeto:
    $imgName = $_FILES['image']['name'];
    $tmpPath = $_FILES['image']['tmp_name'];
    $imgPath = "productsImgs/".$imgName;

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
      <div class="col-6 products-table mt-5 mr-3">
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
              <?php if(isset($_SESSION['products'])){
                foreach ($_SESSION['products'] as $key => $product) { ?>
                  <tr>
                    <td><a href="productPage.php?id=<?= $key ?>"><?= $product['name']; ?></a></td>
                    <td><?= $product['category']; ?></td>
                    <td><?= 'R$ '.$product['price']; ?></td>
                  </tr>
              <?php } ?>
            </tbody>
          </table> 
        <?php } ?>
      <?php } ?>
      </div>

      <!-- Formulário de Cadastro de Produtos -->
      <form class="col-4 form-input ml-4" method="post" action="" enctype="multipart/form-data">
        <h1>Cadastrar Produtos</h1>
        <div class="form-group">
          <label for="productName">Nome</label>
          <input type="text" name="name" class="form-control" id="productName" required placeholder="Insira o nome do produto">
        </div>
        <div class="form-group">
          <label for="productCategory">Categoria</label>
          <!-- Categoria de produtos dinâmica -->
          <select class="form-control" name="category" id="productCategory">
            <option value="select" selected disabled>Selecione uma categoria</option>
            <?php
              foreach ($_SESSION['productCategoryList'] as $category) { ?>
              <option value="<?= $category ?>">
                <?= $category ?>
              </option>    
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="productDescription">Descrição</label>
          <textarea class="form-control" name="description" id="productDescription" cols="30" rows="3"
            required></textarea>
        </div>
        <div class="form-group">
          <label for="productQuantity">Quantidade</label>
          <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Insira a quantidade de produtos em estoque" required>
        </div>
        <div class="form-group">
          <label for="productPrice">Preço</label>
          <input type="number" name="price" id="productPrice" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="productImage">Foto do Produto</label>
          <input type="file" name="image" id="productImage" required>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>