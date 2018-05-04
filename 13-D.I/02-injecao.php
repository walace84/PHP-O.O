<?php

require_once "class/Record.php";

//== D.I COM MÉTODO export() da INTERFACE ==//

// Interface
interface ExportInterface
{
    public function export($data);
}

// XMLExport faz o uso do método export() da Interface para devolver um formato em XML
class XMLExport implements ExportInterface
{
    public function export($data){
        // array_flip - troca todas as chaves com seus valores associados em um array
        $data = array_flip($data);
        $xml = new SimpleXMLElement('<record/>');
        // array_walk_recursive - Aplica uma função de usuário recursivamente a todos os membros de um array
        array_walk_recursive($data, array($xml, 'addChild'));
        return $xml->asXML();
    }
}


// JSOMExport faz o uso da Interface para devolver um formato Json
class JSOMExport implements ExportInterface
{
    public function export($data){
        return json_encode($data);
    }
}

// classe Pessoa que extende da Record e faz o uso da Interface
class Pessoa extends Record
{
    const TABLENAME = 'pessoas';
    public function export(ExportInterface $e){
        return $e->export($this->data);
    }
}


$p = new Pessoa;
$p->nome = "Aline Chaves ";
$p->endereco = "Colatina ";
$p->numero = '123';

print $p->export(new XMLExport); 
echo "<br>";
print $p->export(new JSOMExport);