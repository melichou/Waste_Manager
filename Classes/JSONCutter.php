<?php
require_once 'JSONDecoder.php';
class JSONCutter{
    //Attributes
    
    //Functions
    public function getCut(string $json, string $data) : array{
        //Decoding JSON file
        $decoder = new JSONDecoder();
        $datas = $decoder->getData($json);
        
        //Cutting Datas
        $cutted = $datas["$data"];
        if (empty($cutted) == true){
            throw new Exception("Veuillez revérifier, il n'y a aucunes données.", 1);
        }
        return $cutted;
    
    }
}
?>