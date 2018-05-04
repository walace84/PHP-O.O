<?php

//== AGREGAÇÃO ==// 

// é uma relação entre todo e parte, o objeto todo pode ultilizar funcionalidades do objeto parte
// na agregação o objeto todo recebe as instancias do objeto parte já prontas, ela não é responsavel
// pela sua criação. Assim as instancias do objeto parte são criadas fora da classe.
// quando o objeto todo for destruida na mémoria o objeto parte não é destruido.

require_once'class/Cesta.php';
require_once'class/Produto.php';


$c1 = new Cesta;
$p1 = new Produto('Chocolate', 10);

// método da class Cesta 'Todo'.
$c1->addItem($p1);

foreach ($c1->getItens() as $itens) {
	echo 'item: ' .$itens->getDescricao(). "<br>\n";
	echo 'quantidade: '.$itens->getEstoque(). "<br>\n"; 
}

