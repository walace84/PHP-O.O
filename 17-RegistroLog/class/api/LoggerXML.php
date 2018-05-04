<?php

// Class de log XML

class LoggerXml extends Logger
{
    public function write($message)
    {
        date_default_timezone_get('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        $text = "<log>\n";
        $text.= " <time>$time</time>\n";
        $text.= " <message>$message</message>\n";
        $text.= "</log>\n";

        // adiciona ao final do arquivo
        // Abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo.
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}