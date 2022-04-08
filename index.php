<?php
require_once 'Classes/Services/Incinerator.php';
require_once 'Classes/Services/GlassRecyclor.php';
require_once 'Classes/Services/MetalRecyclor.php';
require_once 'Classes/Services/PaperRecyclor.php';
require_once 'Classes/Services/PlasticRecyclor.php';
require_once 'Classes/Services/Compost.php';
require_once 'Classes/Trashes/PVC.php';
require_once 'Classes/Trashes/Paper.php';
require_once 'Classes/Trashes/Glass.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';

function createIncinerator(){
    //Variables
    $type = 'incinerateur'; //We know already because it's the incinerator class
    $total = 0;
    $capa = 0;
    $lignes = 0;

    $cutter = new JSONCutter();
    $serv = $cutter->getCut(GetCapaServInterface::json,'services');

    foreach ($serv as $i=>$value) {
        $array = $serv[$i];
        if($array["type"] == $type){
            $capa += $value["capaciteLigne"];
            $lignes += $value["ligneFour"];
        }
    }
    $incinerator = new Incinerator($lignes,$capa);
    $total = $capa*$lignes;
    $incinerator->setMaxCapa($total);
    return $incinerator;
}   
$test = createIncinerator();
var_dump($test);
?>