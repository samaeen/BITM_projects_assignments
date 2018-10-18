<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\BookTitle\BookTitle;
$obj = new BookTitle();


$selectedIDs =  $_POST['mark'];

$obj->deleteMultiple($selectedIDs);

$path = $_SERVER['HTTP_REFERER'];

Utility::redirect($path);







