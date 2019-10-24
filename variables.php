<?php 
  
  session_start();

  // Lista de Categorias Possíveis:
  $_SESSION['productCategoryList'] = ["Camisetas", "Calças", "Vestidos", "Acessórios"];
  // $productCategoryList = ["Camisetas", "Calças", "Vestidos", "Acessórios"];

  // Atribuindo os valores lançados no formulário/input às variáveis 
  if($_POST != []){
    $productName = $_POST['productName'];
    $productCategory = $_POST['productCategory'];
    $productDescription = $_POST['productDescription'];
    $productQuantity = $_POST['productQuantity'];
    $productPrice = $_POST['productPrice'];
  }
  // $productDetails = [
  //   ['name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' =>    $productQuantity, 'price' => $productPrice, 'img' => $productImage]
  // ];


?>