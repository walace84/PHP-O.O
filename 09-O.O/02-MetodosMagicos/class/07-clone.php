<?php

class Titulo
{

    public $codigo, $dt_vencimento, $valor, $juros, $multa;

}

// objeto


$titulo = new Titulo;

$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-01-20';
$titulo->valor = 123;
$titulo->juros = 0.1;
$titulo->multa = 2;

// duplicação de objeto na memória

$titulo2 = clone $titulo;
$titulo2->valor = 100;

echo "Valor do Objeto 1: " . $titulo->valor . " - código desse objeto " . $titulo->codigo; 
echo "<br>";
echo "Valor do Objeto 2: " . $titulo2->valor . " - código desse objeto " . $titulo2->codigo;