<?php

class Titulo
{

    public $codigo, $dt_vencimento, $valor, $juros, $multa;

    // Intercepta a chamada a método que não estão acessivéis
    public function __call($method, $values)
    {
        // call_user_func — Chama uma função de usuário dada pelo primeiro parâmetro
        // get_object_vars — Obtém as propriedades públicas de um dado objeto
        return call_user_func($method, get_object_vars($this));
    }

}

// objeto

$titulo = new Titulo;

$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-01-20';
$titulo->valor = 123;
$titulo->juros = 0.1;
$titulo->multa = 2;

$titulo->print_r();

print "A contagem é: " . $titulo->count();