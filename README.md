
referencia : https://www.locaweb.com.br/ajuda/wiki/formulario-de-envio-autenticado-revenda/

alteração na linha 2714 no arquivo "class.phpmailer.php"

// Antes
$magic_quotes = get_magic_quotes_runtime();

// Depois
$magic_quotes = function_exists('get_magic_quotes_runtime') ? get_magic_quotes_runtime() : false;

