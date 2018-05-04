<?php 

//=== TRATAMENTO DE ERROS COM EXEÇÕES ==//

require_once "class/CSVParser.php";

$csv = new CSVParser('cliente.csv', ';');

try{

    $csv->parse();

    while($row = $csv->fetch()){
        print $row['Cliente'] . ' - ';
        print $row['Cidade'] . "<br>\n";
    }
}
catch(Exception $e){
    print $e->getMessage();
}