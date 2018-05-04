<?php

class Fabricante
{
	private $nome;
	private $endereco;
	private $documento;


	public function __construct($n, $e, $d)
	{
		$this->nome = $n;
		$this->endereco = $e;
		$this->documento = $d;
	}

	public function getNome()
	{
		return $this->nome;
	}

}