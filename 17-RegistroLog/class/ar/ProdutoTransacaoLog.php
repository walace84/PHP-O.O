<?php

//== Active Record Melhorada com a Transaction ==//
/*
    Um Active Record é um Row Data Geteway, acrescido que métodos de negócio.
*/

class Produto
{
    private $data;

    function __get($propriedade)
    {
        return $this->data[$propriedade];
    }
    // Métodos mágicos que recebe a propriedade setados no objeto
    function __set($propriedade, $value)
    {
        $this->data[$propriedade] = $value;
    }

    // Retorna objetos de classe devido o __CLASS__
    public static function find($id)
    {
        $sql = "SELECT * FROM produto WHERE id = '$id'";
        print "$sql <br>\n";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        return $result->fetchObject(__CLASS__);
    }

    // Responsável pela gravação e atualização de dados, ele recebe um data que se recefe ao um transporte de dados, Data Tranfer Object um objeto simples apenas para transporte de dados.
    public function save()
    {
        if(empty($this->data['id'])){
            $id = $this->getLastId() + 1;
            $sql = "INSERT INTO produto (id, descricao, estoque , preco_custo, preco_venda, codigo_barras, data_cadastro, origem) VALUES
                                        ('{$id}', '{$this->descricao}', '{$this->estoque}', '{$this->preco_custo}', '{$this->preco_venda}', '{$this->codigo_barras}', '{$this->data_cadastro}', '{$this->origem}')";
        }
        else{
            $sql = "UPDATE produto SET descricao      = '{$this->descricao}',
                                        estoque       = '{$this->estoque}',
                                        preco_custo   = '{$this->preco_custo}',
                                        preco_venda   = '{$this->preco_venda}',
                                        codigo_barras = '{$this->codigo_barras}',
                                        data_cadastro = '{$this->data_cadastro}',
                                        origem        = '{$this->origem}'
                                    WHERE id          = '{$this->id}' ";
        }
        $conn = Transaction::get();
        Transaction::log($sql);
        return $conn->exec($sql); // executa instrução SQL
    }

    // Data Tranfer Object
    public function getLastId()
    {
        $sql = "SELECT max(id) as max FROM produto";
        $conn = Transaction::get();
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }

}