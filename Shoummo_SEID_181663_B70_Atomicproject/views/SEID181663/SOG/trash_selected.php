<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\SOG\SOG;


$obj = new SOG();

$selectedIDs =  $_POST['mark'];

$obj->trashMultiple($selectedIDs);



Utility::redirect("index.php");













/*
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */