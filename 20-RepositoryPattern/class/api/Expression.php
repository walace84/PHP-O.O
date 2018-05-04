<?php

// Pattern query Object é um critéria que representa consulta à base de dados

abstract class Expression
{
    // operadores lógicos
    const AND_OPERATOR = 'AND '; // verdadeiro se $A e $B são verdadeiros
    const OR_OPERATOR = 'OR '; // verdadeiro se $A ou $B forem verdadeiros

    abstract public function dump();

}