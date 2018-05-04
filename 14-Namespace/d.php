<?php

require_once "class/a.php";
require_once "class/b.php";

// passando um alias
use Application\Form as Form;
use Application\Field as Field;

var_dump(new Form);
echo "<br>";
var_dump(new Field);

echo "<br>";

use Compoments\Form as CompomentsForm;

var_dump(new CompomentsForm);
echo "<br>";
var_dump(new Application\Form);
echo "<br>";
var_dump(new Compoments\Form);