<?php
require_once 'Config.php';

$nomes = Array();
$file = fopen("$arquivoCSV", 'r');
$linha = 1;
while (($line = fgetcsv($file)) !== false)
{
  $nomemailcsv = implode('',$line);
  $datacsv = "$nomemailcsv";
  list($nome, $address) = explode("-", $datacsv);

  include 'TextEmail/TextEmail.php';
  include 'SVG/SVG.php';
  include 'envia_email.php';
}
fclose($file);