<?php

// Library Loader carrega as class do frameworks
require_once "Lib/Livro/Core/ClassLoader.php";

$al = new Livro\Core\ClassLoader;
// indica em qual namespace precorrer
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

// Application loader carrega as classe da aplicação
require_once "Lib/Livro/Core/AppLoader.php";

$al = new Livro\Core\AppLoader;
// busca o controle
$al->addDirectory('App/Control');
// busca a model
$al->addDirectory('App/Model');
$al->register();

// verifica se há uma requisição GET e se existe um parâmetro chamado class. se existir identifica pela URL e executa o método show().
if ($_GET) {
    $class = $_GET['class'];
    if (class_exists($class)) {
        $pagina = new $class;
        $pagina->show();
    }
}

