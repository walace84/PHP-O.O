<?php 
// carrega as classes necessárias 
require_once 'class/api/Expression.php'; 
require_once 'class/api/Criteria.php'; 
require_once 'class/api/Filter.php'; 

// Critério simples com OR, e filtros com valores inteiros 
$criteria = new Criteria; 
$criteria->add(new Filter('idade', '<', 16), Expression::OR_OPERATOR); 
$criteria->add(new Filter('idade', '>', 60), Expression::OR_OPERATOR); 
print $criteria->dump() . "<br>\n"; 

// Critério simples com AND, e filtros com vetores de inteiros
$criteria = new Criteria; 
$criteria->add(new Filter('idade','IN',     array(24,25,26))); 
$criteria->add(new Filter('idade','NOT IN', array(10))); 
print $criteria->dump() . "<br>\n"; 

// Critério simples com OR, e filtros com Like
$criteria = new Criteria; 
$criteria->add(new Filter('nome', 'like', 'pedro%'), Expression::OR_OPERATOR); 
$criteria->add(new Filter('nome', 'like', 'maria%'), Expression::OR_OPERATOR); 
print $criteria->dump() . "<br>\n";

// Critério simples com AND e filtros usando IS NOT NULL e "=" 
$criteria = new Criteria; 
$criteria->add(new Filter('telefone', 'IS NOT', NULL)); 
$criteria->add(new Filter('sexo',     '=',      'F')); 
print $criteria->dump() . "<br>\n";

// Critério simples com AND, e filtros usando IN/NOT IN sobre vetores de strings 
$criteria = new Criteria; 
$criteria->add(new Filter('UF', 'IN',     array('RS', 'SC', 'PR'))); 
$criteria->add(new Filter('UF', 'NOT IN', array('AC', 'PI'))); 
print $criteria->dump() . "<br>\n";

// Critério simples que será composto 
$criteria1 = new Criteria; 
$criteria1->add(new Filter('sexo',  '= ', 'F')); 
$criteria1->add(new Filter('idade', '>', '18')); 

// Critério simples que será composto 
$criteria2 = new Criteria; 
$criteria2->add(new Filter('sexo',  '= ', 'M')); 
$criteria2->add(new Filter('idade', '<', '16')); 

// Formação de critério composto 
$criteria = new Criteria; 
$criteria->add($criteria1, Expression::OR_OPERATOR); 
$criteria->add($criteria2, Expression::OR_OPERATOR); 
print $criteria->dump() . "<br>\n"; 
