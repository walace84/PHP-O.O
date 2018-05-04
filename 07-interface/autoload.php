<?php

// Faz a busca de todas as classes

function __autoload($classe)
{
    require_once "class/{$classe}.php";
}