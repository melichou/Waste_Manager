<?php
require_once 'Classes/Services/Recyclor.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
require_once 'Interfaces/CreateServInterface.php';
class PaperRecyclor extends Recyclor implements GetCapaServInterface, CreateServInterface{
    //Attributes
    protected int $maxCapa;
    //Getters & setters
    public function getMaxCapa() : int{
        return $this->maxCapa;
    }
    public function setMaxCapa(int $capa) : self{
        $this->maxCapa = $capa;
        return $this;
    }
    //interfaces' functions
    public function getTotalCapacity() : int
    {
        //Variables
        $type = 'recyclagePapier'; //We know already because it's the PaperRecyclor class
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
    public function createServ() : PaperRecyclor{
        //Variables
        $type = 'recyclagePapier'; // because it's the PaperRecyclor class
        $capa = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');
        

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
            if($array["type"] == $type){
                $capa += $value["capacite"];
            }
        }

        $paperR = new PaperRecyclor($capa);
        $paperR->setMaxCapa($capa);
        return $paperR;
    }
}

?>