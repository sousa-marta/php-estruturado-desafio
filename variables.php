<?php 

// Lista de Categorias Possíveis:
$productCategoryList = ["Camisetas", "Calças", "Vestidos", "Acessórios"];

// Atribuindo os valores lançados no formulário/input às variáveis 
$productName = $_POST['productName'];
$productCategory = $_POST['productCategory'];
$productDescription = $_POST['productDescription'];
$productQuantity = $_POST['productQuantity'];
$productPrice = $_POST['productPrice'];
// $productImage = $_POST['productImage'];

//Criando uma array com informações salvas no Json:
$products = json_decode(file_get_contents(__DIR__."/products.json"),true); 

// $productDetails = [
//   ['name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' =>    $productQuantity, 'price' => $productPrice, 'img' => $productImage]
// ];


?>