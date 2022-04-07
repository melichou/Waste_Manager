<?php
class Trash{
    //Attributes 
    protected string $name;
    protected int $incineration;

    //Constructor 
    public function __construct(string $name, int $incineration){
        $this->name = $name;
        $this->incineration = $incineration;
    }

    //Getters and Setters 
    public function getName() : string{
        return $this->name;
    }
    public function setName(string $name) : self{
        $this->name = $name;
        return $this;
    }

    public function getIncineration() : int{
        return $this->incineration;
    }
    public function setIncineration(int $incineration) : self{
        $this->incineration = $incineration;
        return $this;
    }

}
?>