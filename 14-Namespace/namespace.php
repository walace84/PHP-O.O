<?php 

// declaração

namespace Application;
class Form{}

namespace Components;
class Form{}

// utilização

var_dump(new Form); // Ex 1: object(Components\Form);
echo "<br>";
var_dump(new \Components\Form); // Ex 2: object(Components\Form);
echo "<br>";
var_dump(new \Application\Form); // Ex 3: object(Application\Form);
echo "<br>";
var_dump(new \SplFileInfo('/etc/shaddow')); // Ex 4: object(SplFileInfo);
echo "<br>";
var_dump(new SplFileInfo('etc/shaddow')); // Erro fatal: class 'Components\SplFileInfo'