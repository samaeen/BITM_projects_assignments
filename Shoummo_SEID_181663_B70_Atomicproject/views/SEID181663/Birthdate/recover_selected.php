<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Birthdate\Birthdate;


$obj = new Birthdate();

$selectedIDs =  $_POST['mark'];

$obj->recoverMultiple($selectedIDs);



Utility::redirect("trashed.php");








