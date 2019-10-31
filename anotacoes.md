DÚVIDAS:
1. função deletar bugada;
2. quando não escolho foto para o produto, ela fica em branco, não salva a anterior;
3. depois de página alterada não está voltando para index;



--------------------------------------

VALIDAÇÕES:
- quantidade e preço > 0;
- preço aceitar decimal;
- ter certeza que é arquivo de imagem;

MELHORIAS NO CÓDIGO:
- criar uma página para funções;

VISUAL:

GITHUB:

FUNÇÃO EXCLUIR:
- usar unset para excluir:

ex.
session(start);

unset($_SESSION['products']['1'];
var_dump($_SESSION);
https://stackoverflow.com/questions/369602/deleting-an-element-from-an-array-in-php

FUNÇÃO EDITAR:
https://www.php.net/manual/pt_BR/function.array-splice.php

<!-- Backlog
  2. Deixar categoria de produtos dinâmica em ordem alfabetica
  3. Required no select? -->


