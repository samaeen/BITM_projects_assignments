<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Students\Auth;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Auth();
$status= $auth->setData($_POST)->is_registered();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../Profile/index.php');
    $_SESSION['student']="yes";

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/signup.php');

}


