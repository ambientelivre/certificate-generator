<?php
require_once 'Email/PHPMailerAutoload.php';
require_once 'Email/class.phpmailer.php';

$mailer = new PHPMailer;

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
$mailer->Port = 587;         // Porta SMTP(***)

// Ativar condição utf-8, para acentuação
$mailer->CharSet = 'UTF-8';

$mailer->Username = "$email";
$mailer->Password = "$emailsenha";

$mailer->AddAddress("$address");
$mailer->AddAddress("$email", "Miguel");
$mailer->From = "$email";
$mailer->Sender = "$email";
$mailer->FromName = "$SeuNome";

// assunto da mensagem
$mailer->Subject = $assunto;

$corpoMSG = "$mensagem";
$mailer->MsgHTML($corpoMSG);

// anexar arquivo
$arquivo = "$nome.pdf";
$mailer->AddAttachment($arquivo);

if(!$mailer->Send()) {
   echo "Erro: " . $mailer->ErrorInfo;
  } else {
   echo "Mensagem enviada com sucesso!";
  }