<?php

// Class Produtos 

class Produto
{
	// atributos
	private $descricao;
	private $caracteristica = [];

	public function __construct($descricao)
	{
		$this->descricao = $descricao;
	}

	// Este método instancia a class Caracteristica, passando seus dados para 
	// o atributo caracteristica, qualquer caracteristica que for dada atravez do método addCaracteristica
	// vai ser passado para o atributo caracteristica e para a class Caracteristica, onde ela recebe as caracteristica
	// pelo método construtor.
	public function addCaracteristica($nome, $valor)
	{
		$this->caracteristica[] = new Caracteristica($nome, $valor);
	}

	// Retorna a caracteristica do produto
	public function getCaracteristica()
	{
		return $this->caracteristica;
	}

	// Retorna a descrição do produto que vem atravez do método construtor
	public function getDescricao()
	{
		return $this->descricao;
	}


}