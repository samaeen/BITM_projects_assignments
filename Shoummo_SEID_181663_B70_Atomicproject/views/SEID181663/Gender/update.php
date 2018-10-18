<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;

use App\Gender\Gender;
$obj = new Gender();

$obj->setData($_POST);


$obj->update();

Utility::redirect('index.php');