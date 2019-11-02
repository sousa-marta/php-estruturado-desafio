<?php 
  
  session_start();

  // Lista de Categorias Possíveis:
  $_SESSION['productCategoryList'] = ["Acessórios", "Calças", "Camisetas", "Saias", "Vestidos"];

  // Atribuindo os valores lançados no formulário/input às variáveis 
  if($_POST != []){
    $productName = $_POST['name'];
    $productCategory = $_POST['category'];
    $productDescription = $_POST['description'];
    $productQuantity = $_POST['quantity'];
    $productPrice = $_POST['price'];
  }

?>