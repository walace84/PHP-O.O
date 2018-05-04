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
require_once "class/api/LoggerTXT.php";
require_once "class/model/Produto.php";

try {

    // inicia a transação com base de dados
    Transaction::open('estoque');

    // define o arquivo para log
    //Transaction::setLogger(new LoggerTXT('/tmp/log/log_colletion_get.txt'));

    // define o critério de seleção
    $criteria = new Criteria;
    $criteria->add(new Filter('estoque', '*', 1));
    $criteria->add(new Filter('origem', '=', 'N'));

    // cria o repositório
    $repository = new Repository('Produto');
    // carrega os objetos, conforme o critério . LOAD DA CLASS REPOSITORY
    $produtos = $repository->load($criteria);
    if ($produtos) {
        echo "Produtos" . "<br>";
        // percorre todos objetos
        foreach($produtos as $produto) {
            echo 'ID: ' . $produto->id;
            echo '- Descição ' . $produto->descricao;
            echo '- Estoque '  . $produto->estoque;
            echo '- Valor de Venda '  . $produto->preco_venda;
            echo "<br>\n";
        }

    }

    print "Quantidade: " . $repository->count($criteria);
    Transaction::close();

} catch (Exception $e) {
   echo $e->getMessage();
   Transaction::rollback();
}