<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;

$obj = new \App\BookTitle\BookTitle();

$obj->setData($_POST);


$obj->store();

Utility::redirect('create.php');