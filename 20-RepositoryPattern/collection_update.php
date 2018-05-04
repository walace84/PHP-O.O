<?php

// carrega as classes necessárias

require_once "class/api/Transaction.php";
require_once "class/api/Connection.php";
require_once "class/api/Expression.php";
require_once "class/api/Criteria.php";
require_once "class/api/Repository.php";
require_once "class/api/Record.php";
require_once "class/api/Filter.php";
require_once "class/api/Logger.php";
require_once "class/model/Produto.php";

try {

    // inicia a transação com base de dados
    Transaction::open('estoque');

    // define o critério de seleção
    $criteria = new Criteria;
    $criteria->add(new Filter('preco_venda', '<=', 35));
    $criteria->add(new Filter('origem', '=', 'N'));

    // cria o repositório
    $repository = new Repository('Produto');
    // carrega os objetos, conforme o critério lOAD DA CLASS RECORD
    $produtos = $repository->load($criteria);
    if ($produtos) {
        echo "Produtos" . "<br>";
        // percorre todos objetos
        foreach($produtos as $produto) {
            $produto->preco_venda *= 1.3;
            $produto->store();
        }

    }

    Transaction::close();

} catch (Exception $e) {
   echo $e->getMessage();
   Transaction::rollback();
}