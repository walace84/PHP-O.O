<?php

//=================== INTERFACE ========================//
/*
    Inteface são um recurso utilizado na orientação a objetos para 
    diminuir o acoplamento entre as partes do sistema
*/

// objeto

require_once "class/Produto.php";
require_once "class/Orcamento.php";

$o = new Orcamento;

$o->adiciona(new Produto('Máquina de cafê', 10, 299), 1);
$o->adiciona(new Produto('Televisao', 5, 100), 1);
$o->adiciona(new Produto('Computador', 5, 1100), 1);

echo $o->calculaTotal();