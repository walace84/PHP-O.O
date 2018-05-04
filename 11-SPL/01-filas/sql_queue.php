<?php

// Manipulação de filas = First In First Out

$ingredientes = new SplQueue();

echo "<b>Acrescenta na fila, Primeiro a entrar, primeiro a sair </b><br>";
$ingredientes->enqueue('Peixe');
$ingredientes->enqueue('Sal');
$ingredientes->enqueue('Limão');

foreach($ingredientes as $item){
    print 'Item: ' . $item . '<br>' . PHP_EOL;
}

print "<br>\n";

echo "<b>removendo da fila </b><br>";
print $ingredientes->dequeue() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n";
print $ingredientes->dequeue() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n";
print $ingredientes->dequeue() . "<br>\n";
echo 'Conta: ' . $ingredientes->count() . "<br>\n";