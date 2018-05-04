<?php

// Também é possivel combinar diferentes iterators

//== RecursiveIteratorIterator é um objeto que implementa a recursão ==//

$path = 'C:\xampp\htdocs\Pablo\10-XML';

foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)) as $item){
    print $item . "<br>\n";
}
