<?php

require_once "class/ar/ProdutoTransacao.php";
require_once "class/api/connection.php";
require_once "class/api/Transaction.php";

// Só faz a transação de um objeto de cada vez

try {
    Transaction::open('estoque');

    $p1 = new Produto;
    $p1->descricao     = 'Biscoito';
    $p1->estoque       = 3;
    $p1->preco_custo   = 12;
    $p1->preco_venda   = 10;
    $p1->codigo_barras = '123654';
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem        = 'N';
    $p1->save();

    Transaction::close();

} catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}
