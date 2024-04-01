<?php
require_once 'Email/PHPMailerAutoload.php';
require_once 'Email/class.phpmailer.php';


$mailer = new PHPMailer;


//$mailer->SMTPDebug = 2; // Enable verbose debug output

$mailer->isSMTP(); // Set mailer to use SMTP

$mailer->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mailer->Host = "$emailhost";
$mailer->SMTPAuth = true;     // Ativa SMTP authentication
$mailer->IsSMTP();
$mailer->isHTML(true);       // Email em formato HTML
$mailer->Port = 587;         // Porta padrão(587)

// Ativar condição utf-8, para acentuação
$mailer->CharSet = 'UTF-8';

$mailer->Username = "$email";
$mailer->Password = "$emailsenha";

//$mailer->SMTPDebug = 1;
$corpoMSG = "$mensagem";
$mailer->AddAddress("$address");
//$mailer->AddAddress("conta@gmail.com", "destinatario 2"); // 2º destinatário se querer enviar, se não, comente com //
$mailer->From = "$email";
$mailer->Sender = "$email";
$mailer->FromName = "$SeuNome";
// assunto da mensagem
$mailer->Subject = $assunto;
// corpo da mensagem
$mailer->MsgHTML($corpoMSG);
// anexar arquivo

$arquivo = "$nome.pdf";
$mailer->AddAttachment($arquivo);


if(!$mailer->Send()) {
   echo "Erro: " . $mailer->ErrorInfo;
  } else {
   echo "Mensagem enviada com sucesso!";
  }