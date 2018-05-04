<?php

/* encapsulamento public forma potencialmente perigosa */

class Pessoa
{
	public $nome;
	public $endereco;
	public $nascimento;

}

$p1 = new Pessoa;

$p1->nome = "Maria da Silva";
$p1->endereco = 'Rua Agusta';
$p1->nascimento = '01 de maio de 2015';
$p1->telefone = '27 327214242'; // defina em tempo de execução

print_r($p1); 