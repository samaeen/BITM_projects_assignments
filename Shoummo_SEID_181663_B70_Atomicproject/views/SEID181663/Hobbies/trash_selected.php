<?php
require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\Hobbies\Hobbies;

$selectedIDs = $_POST['mark'];

$obj = new Hobbies();

$obj->trashMultiple($selectedIDs);


Utility::redirect("index.php");