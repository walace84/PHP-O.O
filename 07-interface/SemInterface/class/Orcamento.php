<?php

// Class Orçamento

class Orcamento
{
    private $itens;
    // D.I Em um conceito de agregação
    public function adiciona(Produto $produto, $qtde)
    {
        $this->itens[] = array($qtde, $produto);
    }

    // Forte acoplamento,do tipo estático porque ela utiliza de forma direta o getPreco() da class Produto
    // ela não consegue fazer um orçamento de um serviço, porque está amarada a class Produto.
    public function calculaTotal()
    {
        $total = 0;

        foreach($this->itens as $item){
            $total += ($item[0] * $item[1]->getPreco());
        }

        return $total;
    }
}