<?php

// recebe uma instância da class Connection que faz a conexão com DB

final class Transaction
{
    private static $conn; // conexão ativa

    // O método construct está marcado como private para que não exista várias instância da mesma transação
    private function __construct() {}

    public static function open($database)
    {
        if (empty(self::$conn)) {
            self::$conn = Connection::open($database); // instância da class Connection com o método open()
            self::$conn->beginTransaction(); // inicia a transação
        }
    }     

    // Retorna a conexão ativa
    public static function get()
    {
        return self::$conn; 
    } 

    // desfaz as operações realizadas
    public static function rollback()
    {
        if (self::$conn) {
            self::$conn->rollback(); 
            self::$conn = NULL;
        }
    }

    // Fecha a conexão com o DB aplicando todas as operações realizadas ao longo da transação
    public static function close()
    {
        if (self::$conn) {
            self::$conn->commit();
            self::$conn = NULL;
        }
    }

}