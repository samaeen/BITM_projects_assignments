<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;

use App\SOG\SOG;


$obj = new SOG();

$obj->setData($_POST);


$obj->store();

Utility::redirect('create.php');