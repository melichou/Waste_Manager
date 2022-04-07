<?php
require_once 'Classes/Trash.php';
class Recyclable extends Trash{
    //Attributes
    protected int $recycling;

    //Constructor
    public function __construct(string $name, int $incineration, int $recycling){
        $this->name = $name;
        $this->incineration = $incineration;
        $this->recycling = $recycling;
    }

    //Getters & setters
    public function getRecycling() : int{
        return $this->recycling;
    }
    public function setRecycling(int $recycling) : self{
        $this->recycling = $recycling;
        return $this;
    }
}
?>