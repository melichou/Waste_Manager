<?php
require_once 'Classes/Service.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
class Incinerator extends Service implements GetCapaServInterface{
    //Attributes 
    protected int $fourLine;
    protected int $lineCapacity;

    //Constructor
    public function __construct(int $fourLine, int $lineCapacity){
        //$this->name = $name;
        $this->fourLine = $fourLine;
        $this->lineCapacity = $lineCapacity;
    }
    
    //Getters & setters
    public function getFourLine() : int{
        return $this->fourLine;
    }
    public function setFourLine(int $fourLine) : self{
        $this->fourLine = $fourLine;
        return $this;
    }
    
    public function getLineCapacity() : int{
        return $this->lineCapacity;
    }
    public function setLineCapacity(int $lineCapacity) : self{
        $this->lineCapacity = $lineCapacity;
        return $this;
    }
    
    //interfaces' functions 
    public function getTotalCapacity() : int
    {
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
        $total = $capa*$lignes;
        return $total;
    }
}
?>