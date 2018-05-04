<?php

// Conversão de tipo, criar um objeto apartir de um vetor e vice-versa

$produto = new StdClass;

$produto->descricao = 'Chocolate';
$produto->estoque = 10;
$produto->preco = 3.99;

// converteu o objeto em array
$vetor1 = (array) $produto;
print $vetor1['descricao'] . "<br>\n";

echo "<hr>";

// converte o array para objeto
$vetor2 = ['descricao' => 'Cafê', 'estoque' => 10, 'preco' => 3.99];
$produto2 = (object) $vetor2;
echo $produto2->descricao . "<br>\n";
