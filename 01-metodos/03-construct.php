<?php

/* class com o método construct */

class Produto
{
	private $descricao;
	private $estoque;
	private $preco;

	public function __construct($des, $est, $pre)
	{
		if(is_string($des)){
			$this->descricao = $des;
		}

		if (is_numeric($est)) {
			$this->estoque = $est;
		}

		if (is_numeric($pre)) {
			$this->preco = $pre;
		}
	}


	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getEstoque()
	{
		return $this->estoque;
	}

	public function getPreco()
	{
		return $this->preco;
	}
}

/*  objeto */

$p1 = new Produto('Chocolate', 10, 5);

echo "descricao: " .$p1->getDescricao(). '<br>' . PHP_EOL;
echo 'Estoque: ' .$p1->getEstoque(). '<br>' . PHP_EOL;
ECHO 'Preco: ' .$p1->getPreco(). '<br>' . PHP_EOL;
 



