<?php

/* 
   Atributos estáticos são atributos que pertencem a uma classe
   não a um objeto Especifico, são dinâmicos como atributos de um objeto
   mais ele só pode ser instancia se for public e isso não é bom! 
*/

class Software
{
	/*= ATRIBUTOS =*/
	private $id;
	private $nome;
	public static $contador;

	function __construct($nome)
	{
		self::$contador ++;

		$this->id = self::$contador;
		$this->nome = $nome;
		echo "Software {$this->id} = {$this->nome} <br>\n";
	}
}

// objeto

new Software('PHP');
new Software('Java');
new Software('C++');

echo "Quantidade criada = " . Software::$contador;
