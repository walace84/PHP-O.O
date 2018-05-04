<?php

// classde log TXT

class LoggerTXT extends Logger
{
    public function write($message)
    {
        date_default_timezone_get('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        // monta a string
        $text = "$time = $message\n";
        // adiciona no final do arquivo
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}