<?php
require_once 'Classes/Trashes/Plastic.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetVolTrashInterface.php';
class PET extends Plastic implements GetVolTrashInterface{
    //interfaces' function
    public function getTotalVolume() : float
    {
        $type = 'plastiques'; //It's the parent class
        $type2 = 'PET';        //Because it's the class
        $capa = 0;
        $total = 0;
        $cutter = new JSONCutter();
        $quart = $cutter->getCut(GetVolTrashInterface::json,'quartiers');
        
        foreach ($quart as $i=>$value) {
            $array = $quart[$i];
            foreach ($array as $key=>$val){
                if(is_array($val) == true){
                    $qrt = $array[$key];
                    foreach ($qrt as $j=>$v){
                        if($j == $type2){
                            $capa += $v;
                        }
                    }
                }         
            }
        }
        return $capa;
    }
}