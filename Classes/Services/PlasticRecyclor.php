<?php
require_once 'Classes/Services/Recyclor.php';
require_once 'Classes/Trashes/Plastic.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
class PlasticRecyclor extends Recyclor implements GetCapaServInterface{
    //Attributes
    private array $types;

    //Constructor 
    public function __construct(int $capacity){
        $this->capacity = $capacity;
    }

    //Getters & setters
    public function addPlastic(Plastic $plastic) : array {
        if (!$plastic instanceof Plastic){
            throw new Exception("L'objet que vous essayez d'ajouter n'est pas un Plastique reconnu",1);
        }
        $this->types[] = $plastic;
        return $this->types;
    }
    //Interfaces functions
    public function getTotalCapacity() : int
    {
        //Variables
        $type = 'recyclagePlastique'; //We know already because it's the PlasticRecyclor class
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
    
}
?>