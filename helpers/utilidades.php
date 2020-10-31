<?php 


$carrera = [1 => "Redes", 2 => "Software", 3 => "Multimedia", 4 => "Mecatronica", 5 => "Seguridad informática"];

function getLastElement($list){

    $countList = count($list);
    $lastElement = $list[$countList - 1];

    return $lastElement;

    
}

function getcarreraName($carreraId){
    return $GLOBALS['carrera'] [$carreraId];

}

function buscar($list,$property,$value){
$filter = [];

foreach($list as $item){
    if($item[$property] == $value){
        array_push($filter, $item);
    }

}

return $filter;
}

function getIndexElement($list,$property,$value){
    $index = 0;
    
    foreach($list as $key => $item){
        if($item[$property] == $value){
           $index = $key;
    }
}   
return $index;
} 
?>