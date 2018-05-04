<?php

//== Row Data Gateway ==//
/*
    Provê uma estrutura de classe para persistir um objeto no banco. No Table Data Gateway a instancia do gateway
    não armazena as informações do objeto manipulado, assim sempre precisa passar o parametro para indicar EX: delete(id) SAVE($data)
    já no Row Data Gateway temos um classe que cada instancia do obejto representa um registro no banco.
*/

class ProdutoGateway
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
    // Conexao do banco
    public static function setConnection( PDO $conn)
    {
        self::$conn = $conn;
    }
    // Retorna objetos de classe devido o __CLASS__
    public static function find($id)
    {
        $sql = "SELECT * FROM produto WHERE id = '$id'";
        print "$sql <br>\n";
        $result = self::$conn->query($sql);
        return $result->fetchObject(__CLASS__);
    }

    // Retorna objetos de classe devido o __CLASS__
    public static function all($filter = '')
    {
        $sql = "SELECT * FROM produto ";
        if($filter){
            $sql .= "WHERE $filter";
        }
        print "$sql <br>\n";
        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function delete()
    {
        $sql = "DELETE FROM produto WHERE id = '{$this->id}'";
        print "$sql <br>\n";
        return self::$conn->query($sql);
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
        print "$sql <br>\n";
        return self::$conn->exec($sql); // executa instrução SQL
    }

    // Data Tranfer Object
    public function getLastId()
    {
        $sql = "SELECT max(id) as max FROM produto";
        $result = self::$conn->query($sql);
        $data = $result->fetch(PDO::FETCH_OBJ);
        return $data->max;
    }

}