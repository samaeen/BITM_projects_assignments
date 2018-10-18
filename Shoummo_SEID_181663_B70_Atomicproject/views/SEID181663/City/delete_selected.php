<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\City\City;


$obj = new City();

$selectedIDs =  $_POST['mark'];

$obj->deleteMultiple($selectedIDs);

$path = $_SERVER['HTTP_REFERER'];

Utility::redirect($path);








