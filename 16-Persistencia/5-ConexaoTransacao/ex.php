<?php

// objeto

require_once "class/ar/Produto.php";
require_once "class/api/Connection.php";

try {
    $conn = Connection::open('estoque');
    Produto::setConnection($conn);

    $pro = new Produto;
    $pro->descricao     = 'Cafê torrado e moido brasileiro';
    $pro->estoque       = 100;
    $pro->preco_custo   = 4;
    $pro->preco_venda   = 7;
    $pro->codigo_barras = '963852';
    $pro->data_cadastro = date("Y-m-d");
    $pro->origem        = "N";
    $pro->save();
}
catch (Exception $e) {
    print $e->getMessage();
}