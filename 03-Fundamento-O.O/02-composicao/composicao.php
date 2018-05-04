<?php

/* Composição é uma relação entre objetos de duas classes conhecidas como relação todo/parte */

/* A class Produto é todo */
/* A class caracteristica é parte */

// Na composição o objeto tudo é responsável pela criação e destruição de suas partes
// na composição quando o objeto tudo é destruido suas partes também são pelo fato que 
// foram criadas pelo objeto todo.

require_once'class/Produto.php';
require_once'class/Caracteristica.php';

// Criação dos objetos

$p1 = new Produto('Chocolate');

// composição
/* adiciona caracteristicas de um produto a determinado produto */
$p1->addCaracteristica('Cor', 'Branco');
$p1->addCaracteristica('Peso', '2.6 kg');
$p1->addCaracteristica('Gosto', 'Ao leite');

echo "Produto: " .$p1->getDescricao(). "<br>\n";

foreach ($p1->getCaracteristica() as $value) {
	echo "Caracteristica: " .$value->getNome(). ' - ' .$value->getValor(). "<br>\n"; 
}



