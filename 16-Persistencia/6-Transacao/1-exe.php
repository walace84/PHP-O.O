<?php

require_once "class/ar/Produto.php";
require_once "class/api/connection.php";
require_once "class/api/Transaction.php";

try {
    Transaction::open('estoque');

    // obtém a conexão ativa
    $conn = Transaction::get();
    Produto::setConnection($conn);

    $p1 = new Produto;
    $p1->descricao     = 'Bola de chocolate';
    $p1->estoque       = 3;
    $p1->preco_custo   = 12;
    $p1->preco_venda   = 10;
    $p1->codigo_barras = '123654';
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem        = 'N';
    $p1->save();
    
    // Como foi lançado a execeção o programa não deixa o $p2 ser visivel e ainda não grava o $p1
    // pois não chega ao Transaction::close() fazendo cair no catch
    throw new Exception("Exceção proposital");

    $p2 = new Produto;
    $p2->descricao     = 'Brigadeiro de lata';
    $p2->estoque       = 1;
    $p2->preco_custo   = 5;
    $p2->preco_venda   = 13;
    $p2->codigo_barras = '987654';
    $p2->data_cadastro = date("Y-m-d");
    $p2->origem        = 'N';

    Transaction::close();

} catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}
