<?php

// Objeto

require_once "class/Produto.php";
require_once "class/Venda.php";
require_once "class/VendaMapper.php";

try{

    // Simulação de venda
    $p1 = new Produto;
    $p1->id = 1;
    $p1->preco = 12;

    $p2 = new Produto;
    $p2->id = 2;
    $p2->preco = 15;

    $venda = new Venda;

    // Adiciona alguns produtos
    $venda->addItem(3, $p1);
    $venda->addItem(5, $p2);

    // Conexão
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=pablophp', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Passou a conexão para o setConnection
    VendaMApper::setConnection($conn);

    // Salva a venda
    VendaMApper::save($venda);

}catch(Exception $e){
    print $e->getMessage();
}