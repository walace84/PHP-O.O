<?php

// Função anônima que verifica se existe um arquivo com a extensão PHP na pasta App

spl_autoload_register(function($class){
    if(file_exists("App/{$class}.php")){
        require_once "App/{$class}.php";
        return TRUE;
    }
});


var_dump(new Pessoa);
