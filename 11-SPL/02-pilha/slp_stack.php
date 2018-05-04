<?php

// Manipulação de pilhas

$ingredientes = new Splstack();

//acrescenta na pilha
echo "<b>Acrescenta na Pilha, ultimo a entrar primeiro a sair </b><br>";

$ingredientes->push('Peixe');
$ingredientes->push('Sal');
$ingredientes->push('Limão');

foreach($ingredientes as $item){
    print 'Item: ' . $item . "<br>\n";
}

echo "<br>";

echo "<b>removendo da Pilha </b><br>";

print $ingredientes->pop() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n"; 
print $ingredientes->pop() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n"; 
print $ingredientes->pop() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n"; 



