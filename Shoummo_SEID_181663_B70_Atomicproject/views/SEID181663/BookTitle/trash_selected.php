<?php

require_once ("../../../vendor/autoload.php");

use App\Utility\Utility;
use App\BookTitle\BookTitle;
$obj = new BookTitle();


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