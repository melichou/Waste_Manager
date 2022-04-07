<?php
require_once 'Classes/Services/Incinerator.php';
require_once 'Classes/Services/GlassRecyclor.php';
require_once 'Classes/Services/MetalRecyclor.php';
require_once 'Classes/Services/PaperRecyclor.php';
require_once 'Classes/Services/Compost.php';
require_once 'Classes/JSONDecoder.php';
require_once 'Classes/JSONCutter.php';

//Tests
$compost = new Compost(0,0);
$capa = $compost->getTotalCapacity();
echo $capa;

$inci = new Incinerator(0,0);
$capinci = $inci->getTotalCapacity();
echo "   $capinci   ";

$glassR = new GlassRecyclor(0,true);
$capaGR = $glassR->getTotalCapacity();
echo "   $capaGR   ";

$metal = new MetalRecyclor();
$capaMet = $metal->getTotalCapacity();
echo "   $capaMet   ";

$paper = new PaperRecyclor();
$capaPap = $paper->getTotalCapacity();
echo "   $capaPap   ";
?>