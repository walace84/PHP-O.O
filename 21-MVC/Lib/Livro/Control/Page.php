<?php

// Como essa class é comum a todo um conjunto de classes do sistema  ela é um Pattern Layer Supertype

/* A Page basicamente oferecerar a suas filhas o método show(), para investigar a partir da URL qual 
   ação o usuário que executar
 */

namespace Livro\Control;

class Page
{
    public function show()
    {
        if ($_GET) {
            $class  = isset($_GET['class']) ? $_GET['class'] : NULL;
            $method = isset($_GET['method']) ? $_GET['method'] : NULL;

            if ($class) {
                $object = $class == get_class($this) ? $this : new $class;
                if (method_exists($object, $method)) {
                    call_user_func(array($object, $method), $_GET);
                }
            }
        }
    }
}