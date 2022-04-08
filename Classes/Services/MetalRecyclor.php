<?php
require_once 'Classes/Services/Recyclor.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
require_once 'Interfaces/CreateServInterface.php';
class MetalRecyclor extends Recyclor implements GetCapaServInterface, CreateServInterface{
    //Attributes
    protected int $maxCapa;
    //Constructor
    public function __construct(int $capacity){
        $this->capacity = $capacity;
    }
    //Getters & setters
    public function getMaxCapa() : int{
        return $this->maxCapa;
    }
    public function setMaxCapa(int $capa) : self{
        $this->maxCapa = $capa;
        return $this;
    }
    //Interfaces' functions
    public function getTotalCapacity() : int
    {
        //Variables
        $type = 'recyclageMetaux'; //We know already because it's the MetalRecyclor class
        $capa = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
    
            if($array["type"] == $type){
                $capa += $value["capacite"];
            }
        }
        return $capa;
    }
    public function createServ() : MetalRecyclor{
        //Variables
        $type = 'recyclageMetaux'; // because it's the MetalRecyclor class
        $capa = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');
        

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
            if($array["type"] == $type){
                $capa += $value["capacite"];
            }
        }

        $metalR = new MetalRecyclor($capa);
        $metalR->setMaxCapa($capa);
        return $metalR;
    }
}
?>