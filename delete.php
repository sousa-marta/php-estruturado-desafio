<!-- 
DÚVIDA:
Está excluindo o produto no delete.php, mas quando volta para a index ainda está lá o produto, como se nada tivesse acontecido / não tivesse atualizado a session
 -->

<?php 

include('variables.php');

//Função para excluir o produto:

function deleteProduct($productID,$products){

  //1º Procura a posição referente ao ID do produto:
  foreach ($products as $product) {
    if($product['id'] == $productID){
      $position = array_search($product,$products);
      
      echo '<pre>';
      var_dump($products);
      var_dump($position); //até aqui está funcionando
      
      unset($products[$position]); //aqui exclui;

      echo '<pre>';
      var_dump($products);

      // var_dump($products[$position]);  
      //Undefined offset: 1 in <b>/opt/lampp/htdocs/php-estruturado-desafio/delete.php</b> on line <b>15</b><br />
      
      //Para reordenar numeração de IDs para sequencial:
      // $products = array_values($products);
      // echo "sucesso";
      
      // header("Location: index.php");
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