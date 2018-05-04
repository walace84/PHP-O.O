<?php 

// a class Filter é filha da Expression, faz a filtragem do tipo de dado e valor

class Filter extends Expression
{
    private $variable; // variável
    private $operator; // operador
    private $value;    // valor
    
    public function __construct($variable, $operator, $value)
    {
        // armazena as propriedades
        $this->variable = $variable;
        $this->operator = $operator;
        
        // transforma o valor de acordo com certas regras de tipo
        $this->value    = $this->transform($value);
    }

    // recebe o tipo de dado e o valor
    private function transform($value)
    {
        // caso seja um array
        if (is_array($value)) {
            foreach ($value as $x) {
                if (is_integer($x)) {
                    $foo[]= $x;
                }
                else if (is_string($x)) {
                    $foo[]= "'$x'";
                }
            }
            // converte o array em string separada por ","
            $result = '(' . implode(',', $foo) . ')';
        }
        else if (is_string($value)) {
            $result = "'$value'";
        }
        else if (is_null($value)) {
            $result = 'NULL';
        }
        else if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        }
        else {
            $result = $value;
        }
        // retorna o valor
        return $result;
    }

    public function dump()
    {
        // concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}
