<?php

class Titulo
{
    private $data;

    // Recebe o valor
    public function __set($propriedade, $valor)
    {
        $this->data[$propriedade] = $valor;
    }

    // ler o valor
    public function __get($propriedade)
    {
        return $this->data[$propriedade];
    }

    // retorna em formato JSON
    public function __toString()
    {
        return json_encode($this->data);
    }

}


// objeto

$titulo = new Titulo;
$titulo->dt_vencimento = '2015-05-20';
$titulo->valor = 123;

echo 'O conteúdo do titulo é: ' . $titulo;