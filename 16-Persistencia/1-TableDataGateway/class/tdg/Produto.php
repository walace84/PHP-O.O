<?php

class Produto
{
    private static $conn;
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

    // Método recebe a  conexão ativa da base da dados
    public static function setConnection( PDO $conn)
    {
        self::$conn = $conn;
        ProdutoGateway::setConnection($conn);
    } 

    public static function find($id)
    {
        $gw = new ProdutoGateway;
        return $gw->find($id, 'Produto');
    }

    public static function all($filter = '')
    {
        $gw = new ProdutoGateway;
        return $gw->all($filter, 'Produto');
    }

    public function delete()
    {
        $gw = new ProdutoGateway;
        return $gw->delete($this->id);
    }

    public function save()
    {
        $gw = new ProdutoGateway;
        return $gw->save( (object) $this->data);
    }
    // Varifica a margem de lucro
    public function getMargemLucro()
    {
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }
    // Altera alguns produtos com base na compra efetuada
    public function registraCompra($custo, $quantidade)
    {
        $this->custo = $custo;
        $this->estoque += $quantidade;
    }

}