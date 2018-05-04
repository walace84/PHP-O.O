<?php

//=== Pattern Factory ==//
/*
    O Factory existe para enconder os detalhes da criação de um grupo de objetos, no caso as conexões
    a class Connection instância um objeto PDO de acordo com as insformações passadas.
*/

final class Connection
{
    private function __construct() {}

    public static function open($name)
    {
        // Verifica se existe arquivo de configuração para este banco de dados
        if (file_exists("config/{$name}.ini")) {
            $db = parse_ini_file("config/{$name}.ini");
        }
        else {
            throw new Exception("Arquivo '$name' não encontrado");
        }

        // Lê as informações contidas no arquivo
        $user = isset($db['user']) ? $db['user'] : NULL;
        $pass = isset($db['pass']) ? $db['pass'] : NULL;
        $name = isset($db['name']) ? $db['name'] : NULL;
        $host = isset($db['host']) ? $db['host'] : NULL;
        $type = isset($db['type']) ? $db['type'] : NULL;
        $port = isset($db['port']) ? $db['port'] : NULL;

        // descobre qual tipo de dado está sendo ultilizado
        switch ($type) {
            case 'mysql':
                $port = $port ? $port : '3306';
                $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                break;
        }
        // Define para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        }

}
