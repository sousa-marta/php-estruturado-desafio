<?php 

require_once('variables.php');

// FUNÇÕES DE MANIPULAÇÃO DE PRODUTOS

// ACRESCENTAR NOVOS PRODUTOS NUMA SESSION: 

function addProduct($productName,$productCategory,$productDescription,$productQuantity,$productPrice,$imgPath){
  //Se ainda não teve nenhum produto adicionado:
  if(!isset($_SESSION['products'])){
    $_SESSION['products'] = [];

    $_SESSION['products'][] = ['name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' => $productQuantity, 'price' => $productPrice, 'image' => $imgPath];

    //Validação para verificar se o arquivo foi adicionado corretamente:
    if(!$_SESSION['products']){
      return "Não foi possível cadastrar o produto corretamente";
    }else {
      return "O produto foi adicionado no cadastro corretamente";
    }

  //Se já tem um produto adicionado:
  }else {
    $_SESSION['products'][] = ['name' => $productName, 'category' => $productCategory, 'description' => $productDescription, 'quantity' => $productQuantity, 'price' => $productPrice, 'image' => $imgPath];
    //Validação para verificar se o arquivo foi adicionado corretamente:
    if(!$_SESSION['products']){
      return "Não foi possível cadastrar o produto corretamente";
    }else {
      return "O produto foi adicionado ao cadastro corretamente";
    }
  }
}

// EXCLUIR PRODUTO DE UMA SESSION:

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

// ALTERAR VALORES DE UM PRODUTO (EXCETO IMAGEM):

function editProduct ($currentProduct,$editedProduct,$id){
  foreach ($currentProduct as $key=>$value) {
    // Para o campo 'image' será feito de outra forma, pois temos que salvar a imagem nova
    if($key != "image"){
      if ($value != $editedProduct[$key]){
        $_SESSION['products'][$id][$key] = $editedProduct[$key];
      }
    }
  }
}


?>