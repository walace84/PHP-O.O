<?php

require_once('class/Fabricante.php');
require_once('class/Produto.php');

// CRIAÇÃO DOS OBJETOS

$p1 = new Produto('Cafê', 10, 7);

$f1 = new Fabricante('Factory', 'Silvio Avidos', 10976381702);

// ASSOCIAÇÃO das duas class
$p1->setFabricante($f1);

echo "A descrição é " .$p1->getDescricao(). "<br>\n";
echo "O Fabricante é " .$p1->getFabricante()->getNome(). "<br>\n";

/* FUNDAMENTOS DE O.O */

// A associação é a mais comum entre objetos //
/* na associação um objeto contém uma referência a outro objeto */









