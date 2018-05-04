<?php

// Class Produtos 

class Produto
{

	private $descricao;
	private $estoque;

	public function __construct($descricao, $estoque)
	{
		$this->descricao = $descricao;
		$this->estoque = $estoque;
	}

	public function getCaracteristica()
	{
		return $this->caracteristica;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getEstoque()
	{
		return $this->estoque;
	}

}