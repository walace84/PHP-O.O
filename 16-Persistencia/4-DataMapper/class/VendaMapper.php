<?php

/*
    Responsável por receber estrutura com relacionamento entre objetos e persisti-la na base de dados.
*/

class VendaMapper
{
    private static $conn;
    // Instancia da Conexão PDO
    public static function setConnection( PDO $conn)
    {
        self::$conn = $conn;
    } 

    // Instancia da class Venda D.I
    public static function save(Venda $venda)
    {
        $data = date("Y-m-d");

        $sql = "INSERT INTO venda (data_venda) VALUES ('$data')";
        print $sql . "<br>\n";
        self::$conn->query($sql);
        $id = self::getLastId();
        $venda->setId($id);

        // Percorre os itens vendidos, esse método está na class Venda, que recebe da class Produto a quantidade e valor.
        foreach($venda->getItens() as $item){
            $quantidade = $item[0];
            $produto    = $item[1];
            $preco      = $produto->preco;

            $sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco) VALUES ('$id', '{$produto->id}', '$quantidade', '$preco')";
            print $sql . "<br>\n";
            self::$conn->query($sql);
        }
        
    }
    // Descobri o id inserido
    public function getLastId()
    {
        $sql = "SELECT max(id) as max FROM venda";
        $result = self::$conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }
}