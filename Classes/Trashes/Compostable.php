<?php
require_once 'Classes/Trash.php';
class Compostable extends Trash{
    //Attributes
    protected int $composting;

    //Constructor
    public function __construct(string $name, int $incineration, int $composting){
        $this->name = $name;
        $this->incineration = $incineration;
        $this->composting = $composting;
    }

    //Getters & Setters
    public function getComposting() : int{
        return $this->composting;
    }
    public function setComposting(int $composting) : self{
        $this->composting = $composting;
        return $this;
    }
}
?>