<?php

require_once "class/tdg/Produto.php";
require_once "class/tdg/ProdutoGateway.php";

try{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=pablophp', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Passou a conexão para o setConnection
    ProdutoGateway::setConnection($conn);

    // Seleciona todos os produtos e depois deleta
    $produtos = Produto::all();
    foreach($produtos as $produto){
       $produto->delete();
    }
   
    $p1 = new Produto;
    $p1->descricao      = 'Vinho brasileiro tinto Merlot';
    $p1->estoque        = 10;
    $p1->preco_custo    = 12;
    $p1->preco_venda    = 18;
    $p1->codigo_barras  = '123456';
    $p1->data_cadastro  = date('Y-m-d');
    $p1->origem         = 'N';
    $p1->save();

    $p2 = new Produto;
    $p2->descricao      = 'Vinho Canadennse tinto Chãte';
    $p2->estoque        = 10;
    $p2->preco_custo    = 15;
    $p2->preco_venda    = 28;
    $p2->codigo_barras  = '7893456';
    $p2->data_cadastro  = date('Y-m-d');
    $p2->origem         = 'I';
    $p2->save();

    $p3 = Produto::find(1);
    print 'Descrição: ' . $p3->descricao . "<br\n";
    print '<b> Margem de Lucro: </b>' . $p3->getMargemLucro() . "% <br>\n";
    $p3->registraCompra(15, 2);
    $p3->save();

}catch(Exception $e){
    print $e->getMessage();
}