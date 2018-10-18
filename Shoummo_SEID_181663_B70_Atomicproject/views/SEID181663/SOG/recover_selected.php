<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\SOG\SOG;


$obj = new SOG();

$selectedIDs =  $_POST['mark'];


$obj->recoverMultiple($selectedIDs);

Utility::redirect("trashed.php");








