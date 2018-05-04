<?php

final class Repository
{
    private $activeRecord; // classe manipulada pelo repositório

    function __construct($class)
    {
        $this->activeRecord = $class;
    }

    function load(Criteria $criteria)
    {
        // instancia a instrução SELECT . constant — Retorna o valor de uma constante
        $sql = "SELECT * FROM " . constant($this->activeRecord . '::TABLENAME');
        // obtém a clausula WHERE do objeto critéria.
        if ($criteria) {
            $expression = $criteria->dump();
            if ($expression) {
                $sql .= ' WHERE ' . $expression;
            }

            // obtém as propriedades do critério
            $order = $criteria->getProperty('order');
            $limit = $criteria->getproperty('limit');
            $offset = $criteria->getProperty('offset');

            // obtém a ordenação do SELECT
            if ($order) {
                $sql .= ' ORDER BY ' . $order;
            } if ($limit) {
                $sql .= ' LIMIT ' . $limit;
            } if ($offset) {
                $sql .= ' OFFSET ' . $offset;
            }  
        }

        // obtém transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra o log

            // executa a consulta no BD
            $result = $conn->query($sql);
            $results = array();

            if ($result) {
                // percorre os resultados da consulta, retornando um objeto
                while ($row = $result->fetchObject($this->activeRecord)) {
                    // armazena no array $results
                    $results[] = $row;
                }
            }
            return $results;
        } else {
            throw new Exception('Não há transação ativa!');
        }
    }

    // irá receber um critério como parametro, com base nesse parametro monta a isntrução DELETE
    function delete(Criteria $criteria)
    {
        $expression = $criteria->dump();
        $sql = " DELETE FROM " . constant($this->activeRecord . '::TABLENAME');
        if ($expression) {
            $sql .= ' WHERE ' . $expression;
        }
        // OBTÉM TRANSAÇÃO ATIVA
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra msg de log
            $result = $conn->exec($sql); // executa instrução de DELETE
            return $result;
        } else {
            throw new Exception('Não há transação ativa!');
        }
    }

    // conta quanto objeto satisfazem um dado critério
    function count(Criteria $criteria)
    {
        $expression = $criteria->dump();
        $sql = "SELECT count(*) FROM " . constant($this->activeRecord . '::TABLENAME');
        if ($expression) {
            $sql .= ' WHERE ' . $expression;
        }

        // obtém a transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra a msg de log
            $result = $conn->query($sql); // executa instrução SELECT
            if ($result) {
                $row = $result->fetch();
            }
            return $row[0]; // retorna o resultado
        }
        else {
            throw new Exception('Não há transação ativa!');
        }
    }

}