<?php
$conta_log = 1;

$datas = explode(",", $dias_treinamento);
// Definindo o fuso horário para GMT-3 (Horário de Brasília)
$timezone = new DateTimeZone('America/Sao_Paulo');

foreach ($datas as $data) 
{
    $data_formatada = DateTime::createFromFormat('d/m/Y', $data, $timezone);
    $data_formatada->setTime(0, 0, 0);
    $timestamp = $data_formatada->getTimestamp();
    echo $timestamp;

// Dados
require_once 'config_curl.php';

// Dados para enviar no POST
$postData = array(
    'username' => $username_moodle,
    'password' => $password_moodle,
    //'rememberusername' => 1, // Opcional: manter o nome de usuário na sessão
    'anchor' => ''
);

// Iniciar sessão cURL
$ch = curl_init();

// Configurar opções
curl_setopt($ch, CURLOPT_URL, $url_login);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_COOKIEJAR, 'logs/cookie.txt'); // Salvar cookies para usar em solicitações futuras
curl_setopt($ch, CURLOPT_COOKIEFILE, 'logs/cookie.txt'); // Carregar cookies

// Executar a solicitação
$response = curl_exec($ch);

// Verificar se houve erros
if($response === false) {
    echo 'Erro cURL: ' . curl_error($ch);
} else {
    // Aqui você pode verificar se o login foi bem-sucedido verificando a resposta recebida
    // Por exemplo, verificando se a página de destino após o login foi carregada corretamente
    // Dependendo da implementação do Moodle, você pode precisar fazer outras verificações
    //echo 'Login realizado com sucesso!';
}

// Fechar a sessão cURL
curl_close($ch);

// Iniciar a sessão cURL
$ch = curl_init();

$url_log;

// Configurar opções
curl_setopt($ch, CURLOPT_URL, $url_log);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, 'logs/cookie.txt'); // Carregar cookies salvos anteriormente

// Executar a solicitação
$response = curl_exec($ch);

// Verificar se houve erros
if($response === false) {
    echo 'Erro cURL: ' . curl_error($ch);
} else {
    //  resposta da página
    //echo 'Página aberta com sucesso!';
    $caminho_log = "logs/log$conta_log.txt";
    file_put_contents($caminho_log, $response);
}
curl_close($ch);
$conta_log++;
}