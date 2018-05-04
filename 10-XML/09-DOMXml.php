<?php

$doc = new DOMDocument();
$doc->load('bases.xml');

//== MANIPULAÇÃO DE XML COM DOM  ==//

$bases = $doc->getElementsByTagName("base");

foreach($bases as $base){
    print 'ID: ' . $base->getAttribute('id') . '<br>' . PHP_EOL;

    $names = $base->getElementsByTagName('name');
    $hosts = $base->getElementsByTagName('host');
    $types = $base->getElementsByTagName('type');
    $users = $base->getElementsByTagName('user');

    $name = $names->item(0)->nodeValue;
    $host = $hosts->item(0)->nodeValue;
    $type = $types->item(0)->nodeValue;
    $user = $users->item(0)->nodeValue;

    echo 'Name: ' . $name . '<br>' . PHP_EOL;
    echo 'Host: ' . $host . '<br>' . PHP_EOL;
    echo 'Type: ' . $type . '<br>' . PHP_EOL;
    echo 'User: ' . $user . '<br>' . PHP_EOL;

    echo '<br>' . PHP_EOL;
}