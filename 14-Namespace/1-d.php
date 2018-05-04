<?php

// objeto

require "1-a.php";
require "1-b.php";
require "1-c.php";

use Library\Widgets\Field;
use Library\Widgets\Form;
use Library\Container\Table;

var_dump(new Field);
echo "<br>";
var_dump(new Form);
echo "<br>";
var_dump(new Table);
