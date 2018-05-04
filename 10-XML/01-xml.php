<?php

// interpreta o documento XML, criando um objeto do tipo SimpleXMLElement()

$xml = simplexml_load_file('paises.xml');

// exibe as informções do objeto criado
var_dump($xml);