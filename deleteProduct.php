<?php 

require_once("config/functions.php");

//Pegando o valor do ID do produto recebido:
$id = $_GET['id'];

//Array de produtos:
$products = $_SESSION['products'];

//Executando função para deletar:
deleteProduct($id, $products);

?>