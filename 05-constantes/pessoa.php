<?php

// Cosntantes de classe

class Pessoa
{
	private $nome;
	private $genero;
	const GENEROS = array('M' => 'masculino', 'F' => 'feminino');

	public function __construct($nome, $genero)
	{
		$this->nome = $nome;
		$this->genero = $genero;
	}

	public function getNome()
	{
		return $this->nome;
	}

	// Recebe o gerono vindo do construtor e passa para constante GENEROS
	public function getNomeGenero()
	{
		return self::GENEROS[$this->genero];
	}

}

// objeto

$p1 = new Pessoa('Maria da Silva', 'F');
$p2 = new Pessoa('João Nascimento', 'M');

echo 'Nome: ' . $p1->getNome() . "<br>\n";
echo 'Genero: ' . $p1->getNomeGenero() . "<br>\n";

echo 'Nome: ' . $p2->getNome() . "<br>\n";
echo 'Genero: ' . $p2->getNomeGenero() . "<br>\n";
