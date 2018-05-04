<?php

// interpreta o documento XML
$xml = simplexml_load_file('paises.xml');


//== PERCORRENDO ELEMENTOS FILHOS ==//

// Retorna elementos filhos do objeto bem como seus valores
foreach($xml->children() as $elemento => $valor){
    echo "$elemento => $valor<br>\n";
}