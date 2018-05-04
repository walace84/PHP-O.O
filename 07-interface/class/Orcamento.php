<?php

// Class Orçamento

class Orcamento
{
    private $itens;
    // D.I da interface
    public function adiciona(OrcavelInterface $produto, $qtde)
    {
        $this->itens[] = array($qtde, $produto);
    }

    // Faz o uso do getPreco da interface OrcavelInterface
    public function calculaTotal()
    {
        $total = 0;

        foreach($this->itens as $item){
            $total += ($item[0] * $item[1]->getPreco());
        }

        return $total;
    }
}