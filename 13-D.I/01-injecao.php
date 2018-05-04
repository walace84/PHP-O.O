<?php

require_once "class/Record.php";

// Class exporta tudo para Json
class JSOMExport
{
    public function export($data)
    {
        return json_encode($data);
    }
}

// class Pessoa extende da class Record que faz requisições no banco
// e cria uma instancia da class JSOMExport para trazer os dados em Json

//== fortemente acoplada à classe JSONExport ==//
class Pessoa extends Record
{
    const TABLENAME = 'pessoas';
    public function toJON()
    {
        $je = new JSOMExport;
        return $je->export($this->data);
    }
}


$p = new Pessoa;
$p->nome  = 'Maria da Silva';
$p->endereco = 'Linhares';
$p->numero = '123';
print $p->toJON();