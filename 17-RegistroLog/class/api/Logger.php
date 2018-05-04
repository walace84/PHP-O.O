<?php

//== Class de gerenciamento de log ==//
// Uma class abstrata para indicar quais os métodos necessários para implementar na class concreta
abstract class Logger
{
    protected $filename;

    // Recebe o nome do arquivo de log
    public function __construct($filename)
    {
        // Se filename não existir, o arquivo é criado. Do contrário, o arquivo existente é sobrescrito
        $this->filename = $filename;
        file_put_contents($filename, ''); // limpa o conteúdo do arquivo
    }

    // define o método write com obrigatório
    abstract function write($message);
}