<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;

use App\Birthdate\Birthdate;


$obj = new Birthdate();

$obj->setData($_POST);


$obj->update();

Utility::redirect('index.php');