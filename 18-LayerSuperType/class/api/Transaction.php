<?php

final class Transaction
{
    private static $conn; // conexao ativa
    private static $logger; // objeto de log

    public static function open($database)
    {
        if (empty(self::$conn)) {
            self::$conn = Connection::open($database);
            self::$conn->beginTransaction();
            self::$logger = NULL; // desliga o log de SQL
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

    // Referancia da class Logger, armazena o logger na propriedade    
    public static function setLogger(Logger $logger)
    {
        self::$logger = $logger;
    }
    // escreve o log usando o log gerado na propriedade logger
    public static function log($message)
    {
        if (self::$logger) {
            self::$logger->write($message);
        }
    }
}