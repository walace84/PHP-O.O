<?php

//== MANIPULAÇÃO DE ARQUIVO ==//
// ela extend da class SplFileInfo, podendo pegar seus métodos. 

$file = new SplFileObject('02-spl_file_object.php');

print 'Nome: ' . $file->getFileName() . "<br>\n";
print 'Extensão: ' . $file->getExtension() . "<br>\n";

$file2 = new SplFileObject("novo.txt", "w");
$bytes = $file2->fwrite('olá programador PHP' . PHP_EOL);
print 'Bytes escrito ' . $bytes . "<br>\n";