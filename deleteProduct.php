<?php 

include('variables.php');

//Função para excluir o produto:

function deleteProduct($productID,$products){

  foreach ($products as $product) {
    if($product['id'] == $productID){
      //Procura a posição referente ao ID do produto:
      $position = array_search($product,$products);
      
      //Excluindo Array:
      unset($products[$position]);

      //Atualizando a Array para essa nova Session:
      $_SESSION['products'] = $products;
  
      header("Location: index.php");
    }
  }
}

//Pegando o valor do ID do produto recebido:
$productID = $_GET['productID'];
// var_dump($productID);

$products = $_SESSION['products'];
// var_dump($products);

//Executando função para deletar:
deleteProduct($productID, $products);


?>