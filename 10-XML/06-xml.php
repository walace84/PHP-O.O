<?php

// interpreta o documento XML
$xml = simplexml_load_file('paises3.xml');

echo 'Nome: ' . $xml->nome . "<br>\n";
echo 'Idioma: ' . $xml->idioma . "<br>\n";

echo "<br>";


//== ACESSANDO ELEMENTOS REPETITIVOS ==//

echo "*** Estados ***<br>\n";

// Também podemos acessa pelo indice
// echo $xml->estados->nome[1];

foreach($xml->estados->nome as $estado){
    echo "Estado: " . $estado . "<br>\n";
}