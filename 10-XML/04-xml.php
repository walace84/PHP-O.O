<?php

// interpreta o documento XML
$xml = simplexml_load_file('paises2.xml');

echo "Nome: " . $xml->nome . "<br>\n";
echo "Idioma: " . $xml->idioma . "<br>\n";

echo "<br>\n";


//== ACESSANDO ELEMENTOS FILHOS ==//

echo "*** Informações Geográficas ***<br>\n";

echo 'Clima: ' . $xml->geografia->clima . "<br>\n";
echo 'Costa: ' . $xml->geografia->costa . "<br>\n";
echo 'Pico:  ' . $xml->geografia->pico  . "<br>\n";

// Acessamos a propriedade do nodo filho.