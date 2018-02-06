<?php

use RigorTalks\Temperature;

require_once "../vendor/autoload.php";

$temperature = Temperature::take(-1);
try{
    echo $temperature->measure();
}catch(\RigorTalks\TemperatureNegativeException $exception){
    echo $exception->getMessage();
    die();
}
