<?php

// objeto

require_once "class/api/Transaction.php";
require_once "class/api/Connection.php";
//require_once "class/api/Logger.php";
//require_once "class/api/LoggerTXT.php";
require_once "class/api/Record.php";
require_once "class/model/Produto.php";

try {
    Transaction::open('estoque');
    //Transaction::setLogger(new LoggerTXT('/tmp/log_novo.txt'));
   // Transaction::log('Inserindo produto novo');

    $p1 = new Produto(2);
    $p1->descricao     = 'Xbox one';
    $p1->estoque       = 3;
    $p1->preco_custo   = 650;
    $p1->preco_venda   = 1310;
    $p1->codigo_barras = '963254';
    $p1->data_cadastro = date("Y-m-d");
    $p1->origem        = 'N';
    $p1->store();
    
    Transaction::close();

} catch(Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}