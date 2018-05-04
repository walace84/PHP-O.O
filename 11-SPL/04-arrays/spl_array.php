<?php

// Manipulando arrays

$dados = ['salmão', 'tilapia', 'sardinha', 'badejo', 'corvina'];

$objarray = new ArrayObject($dados);

// acrescenta
$objarray->append('bacalhau');

echo "obtem a posição <br>";
print 'Posição 2: ' . $objarray->offsetGet(2) . "<br>\n";

echo "substitui posição 2 <br>";
$objarray->offsetSet(2, 'linguado');
echo "Posição atual<br>";
print 'Posição 2: ' . $objarray->offsetGet(2) . "<br>\n";

// Elimina a posição 
$objarray->offsetUnset(4);

// teste se a posição existe
if($objarray->offsetExists(6)){
    echo "Posição x encontrada <br>";
}else{
    echo "Posição x não encontrada <br>";
}

print 'Total: '. $objarray->count() . "<br>\n";
// acrescenta
$objarray[] = 'atum';
// ordena
$objarray->natsort();

// percorre dados

print "<br>\n";
foreach($objarray as $item){
    print 'Item: ' . $item . "<br>\n";
}

// serialize - gera uma representação armazenável de um valor
print $objarray->serialize();

