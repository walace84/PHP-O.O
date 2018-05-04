<?php

class Produto
{
	public $descricao;
	public $estoque;
	public $preco;

	public function aumentarEstoque($unidades)
	{
		if(is_numeric($unidades) AND $unidades >= 0){
			$this->estoque += $unidades;
		}
	}


	public function diminuirEstoque($unidades)
	{
		if(is_numeric($unidades) AND $unidades >= 0){
			$this->estoque -= $unidades;
		}
	}

	public function reajustarPreco($percentual)
	{
		if(is_numeric($percentual) AND $percentual >= 0){
			$this->preco *= (1 + ($percentual/100));
		}
	}

}

// OBJETOS

$p1 = new Produto;

$p1->descricao = 'Chocolate';
$p1->estoque   = 10;
$p1->preco     = 8;

echo "O estoque de {$p1->descricao} é {$p1->estoque} <br>\n";
echo "O preço do {$p1->descricao} é {$p1->preco} <br>\n";

echo "<hr>";

$p1->aumentarEstoque(10);
$p1->reajustarPreco(50);
$p1->diminuirEstoque(2);

echo "O estoque de {$p1->descricao} é {$p1->estoque} <br>\n";
echo "O preço do {$p1->descricao} é {$p1->preco} <br>\n";