<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;

use App\Email\Email;


$obj = new Email();

$obj->setData($_POST);


$obj->store();

Utility::redirect('create.php');