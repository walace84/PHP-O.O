<?php

namespace Library\Widgets;

use Library\Container\Table;
use SplFileInfo;

class Form
{
    // Feito o uso de Field sem precisar chama pelo use
    // porque está no mesmo namespace
    public function fazAlgo(Field $x)
    {
   
    }

    // como a class TAble está em um namespace diferente foi preciso
    // chamar pelo o use, assim como a class nativa do PHP SplFileInfo
    public function show()
    {
        new Table;
        new SplFileInfo('/tmp/shadow');
    }
}