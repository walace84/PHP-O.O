<?php

/* private só pode ser alterado dentro da propria classe */
/* Só é possivel atribuir dados no objeto pelo método */
class Pessoa
{
	private $nome;
	private $endereco;
	private $nascimento;

	public function __construct($nome, $endereco)
	{
		$this->nome = $nome;
		$this->endereco = $endereco;
	}

	// esse método verifica se a data está no formato correto 2015-03-30
	public function setNascimento($nascimento):int 
	{
		$partes = explode('-', $nascimento);
		if (count($partes) == 3) {
			if (checkdate($partes[1], $partes[2], $partes[0])) {
				$this->nascimento = $nascimento;
				return TRUE;
			}
			return false;
		}
		return false;
	}

}

/* objeto */

// Não aceitou a data incorreta
$p1 = new Pessoa('João da Silva', 'Rua Silvio Avidos');

if ($p1->setNascimento('01 de maio de 2015')) {
	print "Atribuiu 01 de maio de 2015 <br>\n";
}else{
	print "Não atribuiu 01 de maio de 2015 <br>\n";
}

// Aceito a data correta
if ($p1->setNascimento('2015-12-30')) {
	echo "Atribuiu 2015-12-30 <br>\n";
}else{
	echo "não atribuiu 2015-12-30 <br>\n";
}









