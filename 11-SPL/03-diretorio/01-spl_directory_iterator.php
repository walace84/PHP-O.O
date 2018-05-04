<?php

// O DirectoryIterator, objeto que permite percorrer um diretório, retornando cada um dos itens
//A classe DirectoryIterator fornece uma interface simples para visualização de conteúdo de diretórios de arquivos

$dir = new DirectoryIterator('C:\xampp\htdocs\Pablo\10-XML');

foreach($dir as $file){
    print (string) $file . "<br>\n";
    print 'Nome: ' . $file->getFileName() . "<br>\n";
    print 'Extensão: ' . $file->getExtension() . "<br>\n";
    print 'Tamanho: '  . $file->getSize() . "<br>\n";
    print "<br>\n";
}