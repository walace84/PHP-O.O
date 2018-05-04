<?php

/* a Class Cesta nesse momento só está recebendo os itens, mais poderia receber o time e mais objetos */

class Cesta
{
	private $time;
	private $itens;

	public function __construct()
	{
		$this->time = date('Y-m-d H:i:s');
		$this->itens = array();
	}

	// Este método recebe uma instancia da class produtos e agrega dentro do array itens. 
	public function addItem(Produto $p)
	{
		$this->itens[] = $p;
	}

	// retorna os itens que está dentro do array itens. 
	public function getItens()
	{
		return $this->itens;
	}


	public function getTime()
	{
		return $this->time;
	}

}