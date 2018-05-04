<?php

//== uso de Active Record ==//

// Active Record é um padrão de projeto

/*
    São varias classe herdando da class Record onde faz o insert delete etc
    padrão chamado de Active Record
*/

require "class/Record.php";

class Pessoa extends Record
{
    const TABLENAME = 'pessoas';
}

class Fornecedor extends Record
{
    const TABLENAME = 'fornecedores';
}

class Produto extends Record
{
    const TABLENAME = 'produtos';
}

// objeto

$p = new Pessoa;
$p->Load(1);
echo "<br>";

$p->nome = 'Maria da Silva';
$p->endereco = "Rua das Flores";
$p->numero = '123';
$p->save();

print "<br>";

$p->delete(3);
print "<br>";