<?php
require_once 'Classes/Services/Recyclor.php';
require_once '../../Interfaces/GetCapaServInterface.php';
abstract class PlasticRecyclor extends Recyclor implements GetCapaServInterface{
    //Attributes
    private array $types;

    //Constructor 
    public function __construct(int $capacity, array $types){
        $this->capacity = $capacity;
        if (!array_values($types) instanceof Plastic){
            throw new Exception("Vous n'avez pas spécifié des types de plastiques reconnus.",1);
        }
        $this->types = $types;
    }

    //Getters & setters
    //Interfaces functions
    public function getTotalCapacity()
    {
        //Attributes
              
    }
    
}
?>