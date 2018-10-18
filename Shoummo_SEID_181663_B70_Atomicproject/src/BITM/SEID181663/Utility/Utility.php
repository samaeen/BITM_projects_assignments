<?php
/**
 * Created by PhpStorm.
 * User: Trainer 402
 * Date: 9/18/2017
 * Time: 4:52 PM
 */

namespace App\Utility;


class Utility
{
   public static function redirect($url){

       header("Location:$url");
   }


    public static function d($myVar){
       echo "<pre>";
        var_dump($myVar);
       echo "</pre>";
    }

    public static function dd($myVar){
        echo "<pre>";
        var_dump($myVar);
        echo "</pre>";
        die;
    }


}


