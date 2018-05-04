<?php

require_once "class/rdg/ProdutoGateway.php";

try{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=pablophp', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Passou a conexão para o setConnection
    ProdutoGateway::setConnection($conn);

    $produtos = ProdutoGateway::all();
    foreach($produtos as $produto){
        $produto->delete();
    }

    $p1 = new ProdutoGateway;
    $p1->descricao      = 'Vinho brasileiro tinto Merlot';
    $p1->estoque        = 10;
    $p1->preco_custo    = 12;
    $p1->preco_venda    = 18;
    $p1->codigo_barras  = '123456';
    $p1->data_cadastro  = date('Y-m-d');
    $p1->origem         = 'N';
    $p1->save();

    $p2 = new ProdutoGateway;
    $p2->descricao      = 'Vinho Canadense tinto Chirate';
    $p2->estoque        = 10;
    $p2->preco_custo    = 15;
    $p2->preco_venda    = 28;
    $p2->codigo_barras  = '123456';
    $p2->data_cadastro  = date('Y-m-d');
    $p2->origem         = 'N';
    $p2->save();

    $produto = ProdutoGateway::find(1);
    $produto->estoque += 5;
    $produto->save();

}catch(Exception $e){
    print $e->getMessage();
}