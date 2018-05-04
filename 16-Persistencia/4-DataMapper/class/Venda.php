<?php

// classe de venda

class venda
{
    private $id;
    private $itens;

    public function setId($id)
    {
        $this->id = $id;
    } 

    public function getId()
    {
        return $this->id;
    }

    // Uma Agregação da class Produto, recebe da classe produto seta no objeto o id e preço
    // O método addItem recebe a quantidade e o produto.
    public function addItem($quantidade, Produto $produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }

    public function getItens()
    {
        return $this->itens;
    }
}