<?php
require_once 'Config.php';

$file = fopen("$arquivo_csv", 'r');
while (($line = fgetcsv($file)) !== false)
{
  $nome_email_csv = implode('',$line);
  $data_csv = "$nome_email_csv";
  list($nome, $address) = explode("-", $data_csv);

  include 'TextEmail/TextEmail.php';
  include 'SVG/SVG.php';
  include 'envia_email.php';
}
fclose($file);