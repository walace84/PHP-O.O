<?php

/* class com o método destruct */

class Produto
{
	private $descricao;
	private $estoque;
	private $preco;

	public function __construct($des, $est, $pre)
	{
		$this->descricao = $des;
		$this->estoque = $est;
		$this->preco = $pre;

		echo "CONSTRUIDO: objeto {$des}, estoque {$est}, preco {$pre} <br> \n";
	}

	public function __destruct()
	{
		echo "DESTRUIDO: objeto {$this->descricao}, estoque {$this->estoque}, preco {$this->preco} <br> \n";
	}

}

/* objeto */

$p1 = new Produto('Chocolate', 10, 5);

unset($p1);

$p2 = new Produto('Cafê', 5, 15);

unset($p2);





