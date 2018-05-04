<?php

class LibraryLoader
{
    public static function LoadClass($class)
    {
        if(file_exists("Lib/{$class}.php"));
        require_once "Lib/{$class}.php";
        return TRUE;
    }
}

class ApplicationLoader
{
    public function LoadClass($class)
    {
        if(file_exists("App/{$class}.php")){
            require_once "App/{$class}.php";
            return TRUE;
        }
    }
}

spl_autoload_register(array(new LibraryLoader, 'LoadClass'));
spl_autoload_register(array(new ApplicationLoader, 'LoadClass'));

var_dump(new Endereco);
