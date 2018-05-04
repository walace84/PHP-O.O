<?php

require_once "class/tdg/ProdutoGateway.php";

$data1 = new stdClass;

$data1->descricao      = "vinho Brasileiro Tinto Merlot";
$data1->estoque        = 10;
$data1->preco_custo    = 12;
$data1->preco_venda    = 18;
$data1->codigo_barras  = '123654789';
$data1->data_cadastro = date('Y-m-d');
$data1->origem         = 'N';


$data2 = new stdClass;

$data2->descricao      = "vinho Importado Tinto Carmenere";
$data2->estoque        = 10;
$data2->preco_custo    = 15;
$data2->preco_venda    = 28;
$data2->codigo_barras  = '56894789';
$data2->data_cadastro = date('Y-m-d');
$data2->origem         = 'I';

try{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=pablophp', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Passou a conexão para o setConnection
    ProdutoGateway::setConnection($conn);

    // Fez a chamada da obejto gravou os 2 dados
    $gw = new ProdutoGateway;
    $gw->save($data1);
    $gw->save($data2);
    // buscou o dados de id = 1 no banco e alterou o estoque para mais 2, egravou novamente
    $produto = $gw->find(1);
    $produto->estoque += 2;
    $gw->save($produto);
    // Percoreu todos os dados que estoque é menor ou igual a 10
    foreach($gw->all("estoque <= 10") as $produto){
        print $produto->descricao . "<br>\n";
    }
}catch(Exception $e){
    print $e->getLine();
    print $e->getMessage();
    print $e->getFile();
}