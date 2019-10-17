<!-- Backlog
    Deixar categoria de produtos dinâmica em ordem alfabetica -->

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
  <?php include("config/variables.php"); ?>
  <?php include("config/validations.php"); ?>
  <main class="container">
    <div class="row">
      <div class="col-7">
        <h2>Todos os Produtos</h2>
      </div>
      <form class="col-5 form-input" method="post" action="">
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
          <input type="number" name="productPrice" id="productPrice" class="form-control">
        </div>
        <div class="form-group">
          <label for="productImage">Foto do Produto</label>
          <input type="file" name="productImage" id="productImage" >
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>