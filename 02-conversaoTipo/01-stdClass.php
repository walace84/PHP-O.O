<?php

// Cria objetos de sem ter class definida

$produto = new StdClass;

$produto->descricao = 'Chocolate';
$produto->estoque = 100;
$produto->preco = 5.98;

print_r($produto);
