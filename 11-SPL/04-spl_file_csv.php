<?php

// CRIANDO E ESCREVENDO UM ARQUIVO CSV

$dados = array(

    array('codigo', 'nome', 'endereco', 'telefone'),
    array('1', 'Walace Santana', 'AV Alegre', '(27) 37214565'),
    array('2', 'Aline Chaves', 'AV Avidos', '(27) 37214565'),

);

$file = new SplFileObject('dados.csv', 'w');
// define algo, no caso o modo de separação.
$file->setCsvControl(',');

foreach($dados as $linha){
    // método para escrita no arquivo
    $file->fputcsv($linha);
}
