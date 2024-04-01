<?php
require_once 'Config.php';

$nomes = Array();
$file = fopen("$arquivoCSV", 'r');
$linha = 1;
while (($line = fgetcsv($file)) !== false)
{
  if ($linha < 50){
    $nomemailcsv = implode('',$line);
    $datacsv = "$nomemailcsv";
    list($nome, $address) = explode("-", $datacsv);
    $assunto = "Certificado $curso";



include 'TextEmail/TextEmail.php';
include 'SVG/SVG.php';


file_put_contents("$nome..svg", $SVG);

exec("inkscape --export-type=\"pdf\" '$nome'..svg");

exec("pdfunite '$nome'..pdf Certificadoverso.pdf '$nome'.pdf");

exec("rm '$nome'..svg");

exec("rm '$nome'..pdf");

include 'envia_email.php';

  }
  $linha++;
    
}



fclose($file);