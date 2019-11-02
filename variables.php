<?php 
  
  session_start();

  // Lista de Categorias Possíveis:
  $_SESSION['productCategoryList'] = ["Acessórios", "Camisetas", "Calças", "Vestidos", "Saias",];

  $orderedCategories = ["Saias","Acessórios", "Camisetas", "Calças", "Vestidos"];
  sort($orderedCategories);
  var_dump($orderedCategories);


  // Atribuindo os valores lançados no formulário/input às variáveis 
  if($_POST != []){
    $productName = $_POST['name'];
    $productCategory = $_POST['category'];
    $productDescription = $_POST['description'];
    $productQuantity = $_POST['quantity'];
    $productPrice = $_POST['price'];
  }

?>