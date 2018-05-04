<?php

class ApplicationLoader
{
    public function register()
    {
        spl_autoload_register(array($this, "LoadClass"));
    }

    public function LoadClass($class)
    {
        if(file_exists("App/{$class}.php")){
            require_once "App/{$class}.php";
            return TRUE;
        }
    }

}


$al = new ApplicationLoader;
$al->register();

var_dump(new Pessoa);