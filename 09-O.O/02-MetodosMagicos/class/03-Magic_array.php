<?php

class Titulo
{

    private $data;

    public function __set($pro, $valor)
    {
        $this->data[$pro] = $valor;
    }

    public function __get($pro)
    {
        return $this->data[$pro];
    }

}

// objeto

$titulo = new Titulo;

$titulo->valor = 123;

print 'O valor é: R$ ' . number_format($titulo->valor,2, ',','.');

// O set Grava o valor no vetor, automaticamente 
// o get ler o valor do vetor, automaticamente