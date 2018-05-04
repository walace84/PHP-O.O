<?php

// Vamos usar o Pattern Active Record, em uma Layer SuperType que junta objetos
// comum em uma só parte

class Record
{
    protected $data; // array contendo os dados do objeto

    public function __construct($id = NULL)
    {
        if ($id) { // se ID for informado
            // carrega o objeto correnspondente
            $object = $this->load($id);
            if ($object) {
                $this->fromArray($object->toArray());
            }
        }
    }

    // clona o objeto Active Record e limpa o id para não da erros de persistencia
    public function __clone()
    {
        unset($this->data['id']);
    }

    // sempre que um valor for atribuido a propriedade do objeto o metodo __set() será executado
    // e armazana no array data, pelo nome da propriedade 
    public function __set($prop, $value)
    {
        if (method_exists($this, 'set_' . $prop)) {
            // executa o método set_<propriedade>
            call_user_func(array($this, 'set_'. $prop), $value);
        } else {
            if ($value === NULL) {
                unset($this->data[$prop]);
            } else {
                $this->data[$prop] = $value; // atribui o valor da propriedade
            }
        }
    }

    // sempre que uma propriedade for requisitado, o método __Get será executado
    // o valor da propriedade será lido a partir do data
    public function __get($prop)
    {
        if (method_exists($this, 'get_' . $prop)) {
            // executa o método get_<propriedade>
            return call_user_func(array($this, 'get_' . $prop));
        } else {
            if (isset($this->data[$prop])) {
                return $this->data[$prop];
            }
        }
    } 

    // precisamos definir esse método para teste sempre que o programador testar a presença de um valor
    // no objeto como utilizar a função isset()
    public function __isset($prop)
    {
        return isset($this->data[$prop]);
    }

    // esse método é responsável por retorna o nome da tabela na qual o Active Record será persistido
    // verificando a presença de um constante TABLENAME por meio da função constant().
    private function getEntity()
    {
        $class = get_class($this); // obtem o nome da classe
        return constant("{$class}::TABLENAME"); // retorna a constante de classe TABLENAME
    }

    // será utilizado para preencher os atributos de um Active Record com os dados
    // de um array.de modo que os indices desse array são atributos do objeto.
    public function fromArray($data)
    {
        $this->data = $data;
    }

    // será utilizado para retorna todos os atributos de um obejto, armazenando
    // na propriedade $data em forma de array.
    public function toArray()
    {
        return $this->data;
    }

    // responsável por persistir um objeto no DB
    public function store()
    {
        $prepared = $this->prepare($this->data);
        // verifica se tem ID ou se existe na base de dados
        if (empty($this->data['id']) or (!$this->load($this->id))) {
            // incrementa o ID
            if (empty($this->data['id'])) {
                $this->id = $this->getLast() + 1;
                $prepared['id'] = $this->id;
            }
            // cria uma instrução de insert
            $sql = "INSERT INTO {$this->getEntity()} " .
                   '(' . implode(',', array_keys($prepared)) . ')' .
                   ' VALUES ' .
                   '('.implode(', ', array_values($prepared)) .')'; 
        } else {
            // monta a string de UPDATE
            $sql = "UPDATE {$this->getEntity()}";
            // monta os pares: coluna = valor ...
            if ($prepared) {
                foreach ($prepared as $column => $value) {
                    if ($column !== 'id') {
                        $set[] = "{$column} = {$value}";
                    }
                }
            }
            $sql .= ' SET ' . implode(', ', $set);
            $sql .= ' WHERE id=' . (int) $this->data['id']; 
        }
        // obtém transação ativa
        if ($conn = Transaction::get()) {
            // Transaction::log($sql);
            print "$sql\n";
            $result = $conn->exec($sql);
            return $result;
        } else {
            throw new Exception("Não há transação ativa!");
        } 
    }

    // ler um arquivo no DB e retorna em forma de objeto
    public function load($id)
    {
        // monta instrução de SELECT
        $sql = "SELECT * FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $id;

        // obtém a transação ativa
        if ($conn = Transaction::get()) {
            // cria a msg de log
            //Transaction::log($sql);
            print "$sql\n";
            $result = $conn->query($sql);

            // se retornou algum dado
            if ($result) {
                //retorna os dados em forma de objeto
                $object = $result->fetchObject(get_class($this));
            }
            return $object;
        } else {
            throw new Exception("Não há Transação ativa!");
        }
    }

    // Monta um instrução DELETE baseado no object detectado para Transação
    public function delete($id = NULL)
    {
        // o ID é o parâmetro ou propriedade ID
        $id = $id ? $id : $this->id;
        // monta a string de DELETE
        $sql = "DELETE FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $this->data['id'];

        // obtém transação ativa
        if ($conn = Transaction::get()) {
            // faz o log e executa o SQL
            //Transaction::log($sql);
            print "$sql\n";
            $result = $conn->exec($sql);
            return $result; // retorna o resultado
        } else {
            throw new Exception("Não há transação ativa!");
        }
    }

    // também é responsavél para busca um objeto na base da dados
    // é um atalho para o método load()
    public static function find($id)
    {
        $classname = get_called_class();
        $ar = new $classname;
        return $ar->load($id);
    }

    // retorna o ultimo ID armazenado na tabela
    public function getLast()
    {
        if ($conn = Transaction::get()) {
            $sql = "SELECT max(id) FROM {$this->getEntity()}";
        //cria o log
        // Transaction::log($sql);
        print "$sql" . "<br>\n";
        $result = $conn->query($sql);

        // retorna os dados do bancp
        $row = $result->fetch();
        return $row[0];

        } else {
            throw new Exception("Não há transação ativa!");
        }
    } 

    // responsável por preparar os dados antes de serem inseridos na base de dados
    public function prepare($data)
    {
        $prepared = array();
        foreach($data as $key => $value) {
            if (is_scalar($value)) {
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    // recebe um valor e formata-o conforma o seu tipo
    public function escape($value)
    {
        if (is_string($value) and (!empty($value))) {
            // adiciona \ em aspas
            $value = addslashes($value);
            return " '$value' ";
        } 
        elseif (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        } 
        elseif ($value !== '') {
            return $value;
        }
        else {
            return "NULL";
        }
    }


}