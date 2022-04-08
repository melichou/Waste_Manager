<?php
require_once 'Classes/Services/Recyclor.php';
require_once 'Classes/Trashes/Plastic.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';
require_once 'Interfaces/GetCapaServInterface.php';
require_once 'Interfaces/CreateServInterface.php';
class PlasticRecyclor extends Recyclor implements GetCapaServInterface, CreateServInterface{
    //Attributes
    private array $types;
    private array $plast;

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
    public function getPlast() : array{
        return $this->plast;
    }
    public function setPlast(array $plast) : self{
        $this->plast = $plast;
        return $this;
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
    public function createServ()
    {
        //Variables
        $type = 'recyclagePlastique'; // because it's the MetalRecyclor class
        $mykey = "plastiques";
        $capa = 0;
        $plast = array();
        $obj = null;
        $cutter = new JSONCutter();
        $serv = $cutter->getCut(GetCapaServInterface::json,'services');
    

        foreach ($serv as $i=>$value) {
            $array = $serv[$i];
            if($array["type"] == $type){
                $types = $value["plastiques"];
                foreach ($types as $j=>$v){
                    $plast[] = $v;
                }
                $capa += $value["capacite"];
                $current = new PlasticRecyclor($capa);
                $current->setPlast($plast);
                $obj[] = $current;
                unset($plast);
            }
        }
        return $obj;
    }
}
?>