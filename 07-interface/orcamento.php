<?php

//== Sistema de baixo acoplamento com INTERFACE ==//

require_once "autoload.php";

$o = new Orcamento;
$p = new Produto('Máquina de cafê', 10, 299);
$s = new Servicos('Corte de cabelo', 20);

// Quantidade que foi adicionado
$o->adiciona($p, 1);
$o->adiciona($s, 2);


echo $p->getDescricao() . ': preco R$'  . $p->getPreco() . "<br>";
echo $s->getDescricao() . ': preco R$'  . $s->getPreco() . "<br>";


echo "Total: R$" . $o->calculaTotal();