<!-- Fazer um sort por categoria -->
<?php 

/* $productClasses = ['Camiseta', 'Calças', 'Vestidos', 'Acessórios', 'Bermudas'];
$productClassesSorted = sort($productClasses);
var_dump($productClassesSorted);
Colocar em ordem alfabética na parte do form */

// Lista de Categorias Possíveis:

$productCategoryList = ["Camisetas", "Calças", "Vestidos", "Acessórios"];
var_dump($productCategoryList);
/* $productCategoryListUnsorted = ["Camisetas", "Calças", "Vestidos", "Acessórios"];
$productCategoryList = sort($productCategoryListUnsorted);
var_dump($productCategoryList); */


$productName = $_POST['productName'];
$productCategory = $_POST['productCategory'];
$productDescription = $_POST['productDescription'];
$productQuantity = $_POST['productQuantity'];
$productPrice = $_POST['productPrice'];
$productImage = $_POST['productImage'];

$productDetails = ['name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' => $productQuantity, 'price' => $productPrice, 'img' => $productImage];


?>