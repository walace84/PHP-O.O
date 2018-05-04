<?php

class Titulo
{
    private $data;

    public function __set($propriedade, $valor)
    {
        $this->data[$propriedade] = $valor;
    }

    public function __get($propriedade)
    {
        return $this->data[$propriedade];
    }

    // Informa se a variável foi iniciada
    public function __isset($propriedade)
    {
        return isset($this->data[$propriedade]);
    }

    // destroi a variável
    public function __unset($propriedade)
    {
        unset($this->data[$propriedade]);
    }

}

// objeto

$titulo = new Titulo;
$titulo->valor = 123;

// Até aqui foi verificado que o valor foi definido
if(isset($titulo->valor)){
    print "Valor definido <br>\n";
}else{
    print "Valor não definido";
}

// destruiu o valor
unset($titulo->valor);

if(isset($titulo->valor)){
    print "Valor definido <br>\n";
}else{
    print "Valor não definido";
}