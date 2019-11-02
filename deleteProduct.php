<?php 

include('variables.php');

//Função para excluir o produto:

function deleteProduct($id,$products){

  foreach ($products as $key => $product) {
    if($id == $key){
      //Excluindo Array:
      unset($products[$key]);

      //Atualizando a Array para essa nova Session:
      $_SESSION['products'] = $products;
  
      header("Location: index.php");
    }
  }
}

//Pegando o valor do ID do produto recebido:
$id = $_GET['id'];
// var_dump($productID);

$products = $_SESSION['products'];
// var_dump($products);

//Executando função para deletar:
deleteProduct($id, $products);


?>