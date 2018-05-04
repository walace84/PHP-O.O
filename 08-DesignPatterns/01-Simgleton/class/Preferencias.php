<?php

class Preferencias
{
    private $data;
    private static $instance;

    private function __construct()
    {   // Interpreta um arquivo de configuração
        $this->data = parse_ini_file('application.ini');
    }
    
    public static function getInstance()
    {
        if(empty(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }

    // Atribui um novo valor a chave $key
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
    // recebe a Key = timezone/language/apllication
    public function getData($key)
    {
        return $this->data{$key};
    }

    // salva o novos dados
    public function save()
    {
        $string = '';
        if($this->data){
            foreach($this->data as $key => $value){
                $string .= "{$key} = \"{$value}\" \n";
            }
        }
        // Escreve uma string para um arquivo
        file_put_contents('application.ini', $string);
    }

}