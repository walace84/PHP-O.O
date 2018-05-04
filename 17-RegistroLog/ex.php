<?php

require_once "class/ar/ProdutoTransacaoLog.php";
require_once "class/api/connection.php";
require_once "class/api/Transaction.php";
require_once "class/api/Logger.php";
require_once "class/api/LoggerTXT.php";

// Só faz a transação de um objeto de cada vez

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('/tmp/log.txt'));
    Transaction::log('Inserindo produto novo');

    $p1 = new Produto;
    $p1->descricao     = 'Computador de mesa';
    $p1->estoque       = 3;
    $p1->preco_custo   = 120;
    $p1->preco_venda   = 310;
    $p1->codigo_barras = '963254';
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem        = 'N';
    $p1->save();

    Transaction::close();

} catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
    print $e->getFile();
    
}
