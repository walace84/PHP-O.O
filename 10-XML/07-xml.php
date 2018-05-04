<?php

//interpreta o documento xml

$xml = simplexml_load_file('paises4.xml');


//== ACESSANDO ATRIBUTOS DE ALEMENTOS ==//

echo "*** Estados *** <br>\n";

// imprimi estado e capital
foreach($xml->estados->estado as $estado){
    echo 'Estado: ' . $estado['nome'] . ' Capital: ' . $estado['capital'] . "<br>\n";
}