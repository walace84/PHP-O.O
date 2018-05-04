<?php

// class Serviços

class Servicos implements OrcavelInterface 
{
    private $descricao;
    private $preco;

    // Recebe o a descrição do serviço e o valor
    public function __construct($descricao, $preco)
    {
        $this->descricao = $descricao;
        $this->preco = $preco;
    }
    // retorna o preco
    public function getPreco()
    {
        return $this->preco;
    }
    // retorna a descrição
    public function getDescricao()
    {
        return $this->descricao;
    }
}