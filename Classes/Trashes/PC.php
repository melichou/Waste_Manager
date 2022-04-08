<?php
require_once 'Classes/Trashes/Plastic.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetVolTrashInterface.php';
class PC extends Plastic implements GetVolTrashInterface{
    //interfaces' function
    public function getTotalVolume() : float
    {
        $type = 'plastiques'; //It's the parent class
        $type2 = 'PC';        //Because it's the class
        $capa = 0;
        $total = 0;
        $cutter = new JSONCutter();
        $quart = $cutter->getCut(GetVolTrashInterface::json,'quartiers');
        
        //I'm separing the array to have just one district at a time
        foreach ($quart as $i=>$value) {
            $array = $quart[$i];
            //To grab the data of plastics, I check if a value of my
            //array is an array too in order to separate the "plastics array"
            foreach ($array as $key=>$val){
                if(is_array($val) == true){
                    $qrt = $array[$key];
                    //Now that I have a simple array of plastic types, I check 
                    //if it contains the plastic type I'm looking for (the Class one)
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