<?php

namespace Livro\Database;

use PDO;
use Exception;

//=== Pattern Factory ==//
/*
    O Factory existe para enconder os detalhes da criação de um grupo de objetos, no caso as conexões
    a class Connection instância um objeto PDO de acordo com as insformações passadas.
*/
final class Connection
{
    /**
     * Não podem existir instâncias de TConnection
     */
    private function __construct() {}
    
    /**
     * Recebe o nome do conector de BD e instancia o objeto PDO
     */
    public static function open($name)
    {
        // verifica se existe arquivo de configuração para este banco de dados
        if (file_exists("App/Config/{$name}.ini"))
        {
            // lê o INI e retorna um array
            $db = parse_ini_file("App/Config/{$name}.ini");
        }
        else
        {
            // se não existir, lança um erro
            throw new Exception("Arquivo '$name' não encontrado");
        }
        
        // lê as informações contidas no arquivo
        $user = isset($db['user']) ? $db['user'] : NULL;
        $pass = isset($db['pass']) ? $db['pass'] : NULL;
        $name = isset($db['name']) ? $db['name'] : NULL;
        $host = isset($db['host']) ? $db['host'] : NULL;
        $type = isset($db['type']) ? $db['type'] : NULL;
        $port = isset($db['port']) ? $db['port'] : NULL;
        
        // descobre qual o tipo (driver) de banco de dados a ser utilizado
        switch ($type)
        {
            case 'pgsql':
                $port = $port ? $port : '5432';
                $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass};
                        host=$host;port={$port}");
                break;
            case 'mysql':
                $port = $port ? $port : '3306';
                $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                break;
            case 'sqlite':
                $conn = new PDO("sqlite:{$name}");
                break;
            case 'ibase':
                $conn = new PDO("firebird:dbname={$name}", $user, $pass);
                break;
            case 'oci8':
                $conn = new PDO("oci:dbname={$name}", $user, $pass);
                break;
            case 'mssql':
                $conn = new PDO("mssql:host={$host},1433;dbname={$name}", $user, $pass);
                break;
        }
        // define para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
