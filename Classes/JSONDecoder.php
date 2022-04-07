<?php
class JSONDecoder{
    //Attributes 
    private array $data;
    //Functions
    public function getData(string $json) : array {
        $this->data = json_decode(file_get_contents($json), $assoc = TRUE);
        if (empty($this->data) == true){
            throw new Exception("Veuillez revérifier, il n'y a aucunes données.", 1);
        }
        return $this->data;
    }
}
?>