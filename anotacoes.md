usar unset para excluir

ex.
session(start);

unset($_SESSION['products']['1'];
var_dump($_SESSION);


VALIDAÇÕES:
- quantidade e preço > 0;
- preço aceitar decimal;

ERROS PARA ARRUMAR:
- quando array está vazia, dá o erro:'Notice: Undefined index: products in /opt/lampp/htdocs/php-estruturado-desafio/index.php on line 15' -> isso se estou com var_dump ligado
NULL

VISUAL:
- colocar linha entre produtos impressos;