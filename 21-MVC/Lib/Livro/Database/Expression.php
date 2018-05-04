<?php

namespace Livro\Database;

abstract class Expression
{
    // operadores lógicos
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';
    
    // marca método dump como obrigatório
    abstract public function dump();
}
