<?php

//== Traits ==//

// Traits é semelhante a herança, ao invez de aumentar a responsabilidade
// da SuperClass Record criamos um trait, que converte XML e JSOM

require "class/Record.php";

trait objectConversionTrait
{
    public function toXML()
    {
        $data = array_flip($this->data);
        $xml = new SimpleXMLElement('<'.get_class($this).'/>');
        array_walk_recursive($data, array($xml, 'addChild'));
        return $xml->asXML();
    }

    public function toJSOM()
    {
        return json_encode($this->data);
    }
}

class Pessoa extends Record
{
    const TABLENAME = 'pessoas';
    use objectConversionTrait;
}

$p = new Pessoa;
$p->nome = "Walace Santana";
$p->endereco = "Av Silvio";
$p->numero  = '123';

print "FORMATO XML: " . $p->toXML();
echo "<br>";
print "FORMATO JSOM: " . $p->toJSOM();

echo "<hr>";

/*
    Podemos importar um método de um Trait e disponibilizá-lo com 
    outro nome por meio do operador AS no momento da inclusão do Trait
*/

class Produto extends Record
{
    const TABLENAME = 'produtos';

    use objectConversionTrait{
        toJSOM as exportToJSON;
    }
}

$p2 = new Produto;
$p2->descricao = 'Chocolate';
$p2->preco = 7;
print $p2->exportToJSON();