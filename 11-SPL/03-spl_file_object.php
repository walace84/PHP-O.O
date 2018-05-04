<?php

$file = new SplFileObject('03-spl_file_object.php');

print 'FORMA 1: ' . PHP_EOL;
while(!$file->eof()){
    print 'Linha: ' . $file->fgets();
}

print PHP_EOL .  PHP_EOL;

print 'Forma 2: ' . PHP_EOL;
foreach($file as $linha => $conteudo){
    print "$linha: $conteudo";
}
