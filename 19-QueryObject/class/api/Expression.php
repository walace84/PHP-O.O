<?php

// Pattern query Object é um critéria que representa consulta à base de dados

abstract class Expression
{
    // operadores lógicos
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';

    abstract public function dump();

}