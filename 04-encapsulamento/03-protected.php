<?php

/* protected pode ser acessado dentro de sua classe e nas classes filhas */

// classe Pessoa
class Pessoa
{
	protected $nome;

	public function __construct($nome)
	{
		$this->nome = $nome;
	}
}

// classe Funcionario
class Funcionario extends Pessoa
{
	private $cargo;
	private $salario;

	public function contrata($c, $s)
	{
		if (is_numeric($s) AND $s > 0) {
			$this->cargo = $c;
			$this->salario = $s;
		}
	}
	// trás a insformações do nome cargo e salário
	public function getInfo()
	{
		return "Nome: {$this->nome} <br> Cargo: {$this->cargo} <br> salário: {$this->salario}";
	}

}

// objeto

$p1 = new Funcionario('Maria da Silva');
$p1->contrata('Auxiliar Adminitrativa', 1500);

print $p1->getInfo();