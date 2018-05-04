<?php

//== Designer Pattern Table Data Gateway ==//

// Oferece uma interface de comunicação com o banco de dados //

class ProdutoGateway
{
    private static $conn;
    // Metodo para receber a conexão, recebe um D.I
    public static function setConnection( PDO $conn )
    {
        self::$conn = $conn;
    } 

    // Recebe o ID do registro como parametro, executa uma query simples
    public function find($id, $class = 'stdClass')
    {
        $sql = "SELECT * FROM produto WHERE id = '$id' ";
        print "$sql <br>\n";
        $result = self::$conn->query($sql);
        return $result->fetchObject($class);
    }

    // Recebe opcionalmente como parametro um filtro, e retrona todos os registro do banco pelo fetchAll()
    public function all($filter, $class = 'stdClass')
    {
        $sql = "SELECT * FROM produto ";
        if($filter){
            $sql .= "WHERE $filter";
        }
        print "$sql <br>\n";
        $result = self::$conn->query($sql);
        // PDO::FETCH_CLASS retorna uma nova instância da classe solicitada
        return $result->fetchAll(PDO::FETCH_CLASS, $class);
    }

    // Recebe o ID como parametro e executa uma query de exclusão
    public function delete($id)
    {
        $sql = "DELETE FROM produto WHERE id = '$id' ";
        print "$sql <br>\n";
        return self::$conn->query($sql);
    }

    // Responsável pela gravação e atualização de dados, ele recebe um data que se recefe ao um transporte de dados, Data Tranfer Object um objeto simples apenas para transporte de dados.
    public function save($data)
    {
        if(empty($data->id)){
            $id = $this->getLastId() + 1;
            $sql = "INSERT INTO produto (id, descricao, estoque , preco_custo, preco_venda, codigo_barras, data_cadastro, origem) VALUES
                                        ('{$id}', '{$data->descricao}', '{$data->estoque}', '{$data->preco_custo}', '{$data->preco_venda}', '{$data->codigo_barras}', '{$data->data_cadastro}', '{$data->origem}')";
        }
        else{
            $sql = "UPDATE produto SET descricao     = '{$data->descricao}',
                                       estoque       = '{$data->estoque}',
                                       preco_custo   = '{$data->preco_custo}',
                                       preco_venda   = '{$data->preco_venda}',
                                       codigo_barras = '{$data->codigo_barras}',
                                       data_cadastro = '{$data->data_cadastro}',
                                       origem        = '{$data->origem}'
                                 WHERE id            = '{$data->id}' ";
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