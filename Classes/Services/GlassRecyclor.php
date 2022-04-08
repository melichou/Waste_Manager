<?php
require_once 'Classes/Services/Recyclor.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
require_once 'Interfaces/CreateServInterface.php';
class GlassRecyclor extends Recyclor implements GetCapaServInterface, CreateServInterface{
    //Attributes 
    private bool $consigne;
    protected int $maxCapa;

    //Constructor
    public function __construct(int $capacity, bool $consigne){
        $this->capacity = $capacity;
        $this->consigne = $consigne;
    }

    //Getters & setters 
    public function getConsigne(): bool{
        return $this->consigne;
    }
    public function setConsigne(bool $consigne) : self{
        $this->consigne = $consigne;
        return $this;
    }

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
        $type = 'recyclageVerre'; //We know already because it's the GlassRecyclor class
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

    public function createServ() : GlassRecyclor{
        //Variables
        $type = 'recyclageVerre'; // because it's the GlassRecyclor class
        $capa = 0;
        $consigne = false;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
            if($array["type"] == $type){
                $capa += $value["capacite"];
                $consigne = $value["consigne"];
            }
        }

        $glassR = new GlassRecyclor($capa, $consigne);
        $glassR->setMaxCapa($capa);
        return $glassR;
    }
}
?>