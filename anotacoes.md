DÚVIDAS:
1. função para pegar array respectiva ao id recebido na página do produto;
2. que função vou usar para alterar array..?








--------------------------------------

VALIDAÇÕES:
- quantidade e preço > 0;
- preço aceitar decimal;
- ter certeza que é arquivo de imagem;

MELHORIAS NO CÓDIGO:
- criar uma página para funções;

VISUAL:
- colocar linha entre produtos impressos;

GITHUB:
- depois que ter certeza que a branch fez o merge certinho, deletar a branch session

FUNÇÃO EXCLUIR:
- usar unset para excluir:

ex.
session(start);

unset($_SESSION['products']['1'];
var_dump($_SESSION);


<!-- Backlog
  2. Deixar categoria de produtos dinâmica em ordem alfabetica
  3. Required no select? -->
