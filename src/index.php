<?php

use RigorTalks\Temperature;

require_once "../vendor/autoload.php";

$temperature = new Temperature("18");
echo $temperature->measure();