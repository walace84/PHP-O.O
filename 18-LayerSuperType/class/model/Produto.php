<?php 

class Produto extends Record
{
    const TABLENAME = 'produto';

    // forma de prover Encapsulamento em Active Record, verifica se o numerico e se é maior que 0 zero
    public function set_estoque($estoque)
    {
        if (is_numeric($estoque) AND $estoque > 0) {
            $this->data['estoque'] = $estoque;
        }
        else {
            throw new Exception("Estoque {$estoque} inválido em " . __CLASS__);
        }
    }
}