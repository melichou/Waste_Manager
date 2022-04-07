<?php
require_once 'Classes/Services/Incinerator.php';
require_once 'Classes/Services/GlassRecyclor.php';
require_once 'Classes/Services/MetalRecyclor.php';
require_once 'Classes/Services/PaperRecyclor.php';
require_once 'Classes/Services/PlasticRecyclor.php';
require_once 'Classes/Services/Compost.php';
require_once 'Classes/Trashes/PVC.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';

$plasticR = new PlasticRecyclor(0);
$pvc = new PVC('test',20,5);

$plastics = $plasticR->addPlastic($pvc);
print_r($plastics);

$test = $plasticR->getTotalCapacity();
echo $test;
?>