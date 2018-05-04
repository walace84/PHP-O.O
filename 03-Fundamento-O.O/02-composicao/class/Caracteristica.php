<?php

// Recebe pelo método construtor o nome e valor passado pelo objeto

class Caracteristica
{

	private $nome;
	private $valor;
	
	// Recebe as caracteristica do produto, que está sendo passado na class Produto atravez da instancia desta classe
	public function __construct($nome, $valor)
	{
		$this->nome = $nome;
		$this->valor = $valor;
	}


	public function getNome()
	{
		return $this->nome;
	}

	public function getValor()
	{
		return $this->valor;
	}

}