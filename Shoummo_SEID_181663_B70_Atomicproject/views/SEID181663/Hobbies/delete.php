

<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Hobbies\Hobbies;
use App\Utility\Utility;

$obj = new Hobbies();
$obj->setData($_GET);

$obj->delete();

$path = $_SERVER['HTTP_REFERER'];

Utility::redirect($path);
?>