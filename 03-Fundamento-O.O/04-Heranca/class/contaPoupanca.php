<?php

class contaPoupanca extends Conta
{

	function retirar($quantia)
	{
		if($this->saldo >= $quantia){

			$this->saldo -= $quantia;

		}else{
			return false; // retirada não permitida
		}

		return true; // retirada permitida
	}

}