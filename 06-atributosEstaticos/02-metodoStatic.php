<?php

/*
	Para manipular atributos estáticos podemos criar métodos estáticos
	métodos estáticos podem ser executados diretamente a partir da classe
	sem a necessidade de criar um objeto para isso.
*/

class Software
{
	/*= ATRIBUTOS =*/
	private $id;
	private $nome;
	private static $contador;

	function __construct($nome)
	{
		self::$contador ++;

		$this->id = self::$contador;
		$this->nome = $nome;
		echo "Software {$this->id} = {$this->nome} <br>\n";
	}

	// retorna a quantidade do contador
	public static function getContador()
	{
		return self::$contador;
	}

}

// objetos

new Software('PHP');
new Software('Java');
new Software('C++');

echo "Quantidade criada = " . Software::getContador();