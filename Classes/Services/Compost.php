<?php
require_once 'Classes/Service.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
class Compost extends Service implements GetCapaServInterface{
    //Attributes
    protected int $capacity;
    protected int $foyer;

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

    //Functions
    public function getTotalCapacity() : int
    {
        //Variables
        $type = 'composteur'; //We know already because it's the compostor class
        $total = 0;
        $capa = 0;
        $lignes = 0;

        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
    
            if($array["type"] == $type){
                $capa += $value["capacite"];
                $lignes += $value["foyers"];
            }
        }
        $total = $capa*$lignes;
        return $total;
    }
}
?>