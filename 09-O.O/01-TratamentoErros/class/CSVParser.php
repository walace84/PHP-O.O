<?php

class CSVParser
{
    private $filename, $data, $header, $counter, $separator;

    public function __construct($filename, $separator = ',')
    {
        $this->filename = $filename;
        $this->separator = $separator;
        $this->counter = 1;
    }

    // Lê o arquivo por meio da função file(), que o carrega na mémoria e o tranforma em um array
    // $this->data, e cada linha lida do arquivo será uma posição do array. A função str_getcsv
    // efetua a leitura da primerira linha do arquivo e armazena no atributo header. 
    public function parse()
    {
        if(!file_exists($this->filename)){
            throw new Exception("Arquivo {$this->filename} não encontrado");
        }
        if(!is_readable($this->filename)){
            throw new Exception("Arquivo {$this->filename} não pode ler lido");
        }
        $this->data = file($this->filename);
        // str_getcsv — Analisa uma string CSV e retorna os dados em um array
        $this->header = str_getcsv($this->data[0], $this->separator);
    }
    // Retorna para o usuário em linha lida de cada vez
    public function fetch()
    {
        if(isset($this->data[$this->counter])){
            $row = str_getcsv($this->data[$this->counter ++], $this->separator);
            foreach($row as $key => $value){
                $row[$this->header[$key]] = $value;
            }
            return $row;
        }
    }

}