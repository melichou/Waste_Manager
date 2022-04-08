<?php
require_once 'Classes/Trashes/Recyclable.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetVolTrashInterface.php';
class Glass extends Recyclable implements GetVolTrashInterface{
    //Interfaces' functions 
    public function getTotalVolume() : float
    {
        $type = 'verre'; //Because it's the "Glass" class
        $capa = 0;
        $total = 0;
        $cutter = new JSONCutter();
        $quart = $cutter->getCut(GetVolTrashInterface::json,'quartiers');

        foreach ($quart as $i=>$value) {
            $array = $quart[$i];

            if($array["$type"]){
                $capa += $value["$type"];
            }
    
        }
        return $capa;
    }

    

}