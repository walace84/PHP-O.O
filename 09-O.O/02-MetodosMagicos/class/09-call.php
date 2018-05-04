<?php

class Titulo
{

    public $codigo, $dt_vencimento, $valor, $juros, $multa;

    // Intercepta a chamada a método que não estão acessivéis
    public function __call($method, $values)
    {
        print "você executou o método {$method}, com os parâmetros: " . implode(',', $values) . "<br>\n";
    }

}

// objeto

$titulo = new Titulo;

$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-01-20';
$titulo->valor = 123;
$titulo->juros = 0.1;
$titulo->multa = 2;

$titulo->teste1(1,2,3);
$titulo->teste2(2,5,4);