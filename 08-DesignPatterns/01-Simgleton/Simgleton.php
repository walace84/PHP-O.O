<?php

require_once "class/Preferencias.php";

// obtém uma instância

$p1 = Preferencias::getInstance();
// Inicial
print 'A linguagem é: ' . $p1->getData('language') . "<br>\n";
// Modificada pelo método setData().
$p1->setData('language', 'pt-BR');
echo 'A linguagem é : ' . $p1->getData('language') . "<br>\n";

// obtém a mesma instância
$p2 = Preferencias::getInstance();
print 'Obejto 2 A linguagem é : ' . $p2->getData('language') . "<br>\n";

// Grava o valor

//$p1->save();