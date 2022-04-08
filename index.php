<?php
require_once 'Classes/Services/Incinerator.php';
require_once 'Classes/Services/GlassRecyclor.php';
require_once 'Classes/Services/MetalRecyclor.php';
require_once 'Classes/Services/PaperRecyclor.php';
require_once 'Classes/Services/PlasticRecyclor.php';
require_once 'Classes/Services/Compost.php';
require_once 'Classes/Trashes/PVC.php';
require_once 'Classes/Trashes/PC.php';
require_once 'Classes/Trashes/PET.php';
require_once 'Classes/Trashes/PEHD.php';
require_once 'Classes/Trashes/Paper.php';
require_once 'Classes/Trashes/Glass.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';

function createPlasticRecyclor(){
    //Variables
    $type = 'recyclagePlastique'; // because it's the MetalRecyclor class
    $mykey = "plastiques";
    $capa = 0;
    $plast = array();
    $obj = null;
    $cutter = new JSONCutter();
    $serv = $cutter->getCut(GetCapaServInterface::json,'services');
    

    foreach ($serv as $i=>$value) {
        $array = $serv[$i];
        if($array["type"] == $type){
            $types = $value["plastiques"];
            foreach ($types as $j=>$v){
                    $plast[] = $v;
                }
            $capa += $value["capacite"];
            $current = new PlasticRecyclor($capa);
            $current->setPlast($plast);
            $obj[] = $current;
            unset($plast);
        }
    }
    return $obj;

}

$test = createPlasticRecyclor();
print_r($test) ;


?>