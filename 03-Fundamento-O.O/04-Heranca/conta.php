<?php

// Aqui vimos o conceito de herença onde uma class filha extend da class Pai


require 'class/Conta.php';
require 'class/contaCorrente.php';
require 'class/contaPoupanca.php';

// criação dos objetos

$contas = array();

$contas[] = new contaCorrente(6677, 'CC.1234.50', 100, 500);
$contas[] = new contaPoupanca(6678, 'PP.1234', 50);

// percorre as contas

foreach ($contas as $key => $conta) {
	echo "Conta : {$conta->getInfo()} <br>\n";
	echo "     Saldo Atual: {$conta->getSaldo()} <br>\n";
	echo $conta->depositar(200) . "deposito de 200 <br>\n";
	echo "     Saldo Atual: {$conta->getSaldo()} <br>\n";


	if($conta->retirar(700)){
		echo "<b>Retirada de: 700 </b> <br>\n";
	}else{
		echo "<b>Retirada de: 700 não permitida </b><br>\n";
	}

	echo "Saldo Atual: {$conta->getSaldo()} <hr>\n";

}







