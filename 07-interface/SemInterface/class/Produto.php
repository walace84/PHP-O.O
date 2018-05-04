<?php

/**************************/
/* Sem interface          */
/**************************/

//== Classe de Produto ===//

class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    public function __construct($descricao, $estoque, $preco)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;
    }

    // retorna o preco 
    public function getPreco()
    {
        return $this->preco;
    }

}
