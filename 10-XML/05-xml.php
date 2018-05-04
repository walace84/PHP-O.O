<?php

// Alterando o conteúdo do documento

// interpreta o documento XML
$xml = simplexml_load_file('paises2.xml');


//== ALTERANDO O CONTEÚDO DO DOCUMENTO ==//

//alterações de propriedades

$xml->moeda = "Novo Real (NR$)";
$xml->geografia->clima = 'Temperado';

// adiciona novo modo
$xml->addChild('presidente', 'Chapolim Colorado');

// atribuindo novo XML
echo $xml->asXML();

//exibindo o novo xml
file_put_contents('paises2.xml', $xml->asXML());