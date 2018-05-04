<?php

// interpreta o documento XML
$xml = simplexml_load_file('paises.xml');


//== ACESSANDO ATRIBUTOS ==//

// Exibe os atributos do objeto criado

echo "Nome: " . $xml->nome . "<br>\n";
echo "Idioma: " . $xml->idioma . "<br>\n";