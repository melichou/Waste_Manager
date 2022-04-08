<?php
require_once 'Classes/Service.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
require_once 'Interfaces/CreateServInterface.php';
class Compost extends Service implements GetCapaServInterface, CreateServInterface{
    //Attributes
    protected int $capacity;
    protected int $foyer;
    protected int $maxCapa;

    //Constructor
    public function __construct(int $capacity, int $foyer){
        //$this->name = $name;
        $this->capacity = $capacity;
        $this->foyer = $foyer;
    }

    //Getters & setters 
    public function getCapacity() : int{
        
        return $this->capacity;
    }
    public function setCapacity(int $capacity) : self{
        $this->capacity = $capacity;
        return $this;
    }

    public function getFoyer() : int{
        return $this->foyer;
    }
    public function setFoyer(int $foyer) : self{
        $this->foyer = $foyer;
        return $this;
    }

    public function getMaxCapa() : int{
        return $this->maxCapa;
    }
    public function setMaxCapa(int $capa) : self{
        $this->maxCapa = $capa;
        return $this;
    }

    //Functions
    public function getTotalCapacity() : int
    {
        //Variables
        $type = 'composteur'; //We know already because it's the compostor class
        $total = 0;
        $capa = 0;
        $foyer = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
    
            if($array["type"] == $type){
                $capa += $value["capacite"];
                $foyer += $value["foyers"];
            }
        }
        $total = $capa*$foyer;
        return $total;
    }

    public function createServ() 
    {
        //Variables
        $type = 'composteur'; // because it's the incinerator class
        $total = 0;
        $capa = 0;
        $foyer = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
            if($array["type"] == $type){
                $capa += $value["capacite"];
                $foyer += $value["foyers"];
            }
        }
        $compost = new Compost($capa, $foyer);
        $total = $capa*$foyer;
        $compost->setMaxCapa($total);
        return $compost;
    }
}
?>