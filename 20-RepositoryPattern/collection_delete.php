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
    $criteria->add(new Filter('descricao', 'LIKE', '%biscoito%'), Expression::OR_OPERATOR);
    $criteria->add(new Filter('descricao', 'LIKE', '%IPA%'), Expression::OR_OPERATOR);

    // cria o repositório
    $repository = new Repository('Produto');
    // exclui os objetos conforme o critério
    $repository->delete($criteria);


    Transaction::close();

} catch (Exception $e) {
   echo $e->getMessage();
   Transaction::rollback();
}