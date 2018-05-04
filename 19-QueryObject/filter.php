<?php

// obejto 
require_once "class/api/Expression.php";
require_once "class/api/Filter.php";

// cria um filtro por data (string)
$filter1 = new Filter('data', '=', '2007-06-02');
print $filter1->dump() . "<br>";

// cria um filtro por salário (interger)
$filter2 = new Filter('Salario' , '>', 3000);
print $filter2->dump() . "<br>";

// cria um filtro por gênero (array)
$filter3 = new Filter('genero', 'IN', array('M', 'F'));
print $filter3->dump() . "<br>";

//cria um filtro por contrato (null)
$filter4 = new Filter('contrato', 'IN NOT', 'NULL');
print $filter4->dump() . "<br>";

// cria um filtro por ativo (booleano)
$filter5 = new Filter('ativo', '=', 'TRUE');
print $filter5->dump() . "<br>";