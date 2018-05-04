<?php

class Conta
{
	protected $agencia;
	protected $conta;
	protected $saldo;


	public function __construct($agencia, $conta, $saldo)
	{
		$this->agencia = $agencia;
		$this->conta   = $conta;
		if($saldo >= 0){
			$this->saldo = $saldo;
		}
	}

	// Retorna informações da agencia e conta
	public function getInfo()
	{
		return "Agência: {$this->agencia}, Conta: {$this->conta}";
	}

	// soma um valor depositado ao saldo atual
	public function depositar($quantia)
	{
		if($quantia > 0){
			$this->saldo += $quantia;
		}
	}

	// Retorna o saldo atual
	public function getSaldo()
	{
		return $this->saldo;
	}

}