<?php

namespace App\Email;

use App\Message\Message;
use App\Model\Database;
use App\ProfilePicture\ProfilePicture;
use App\Utility\Utility;
use PDO;

class Email extends Database
{
    public $id, $name, $email;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id = $postArray['id'];

        if(array_key_exists("Name",$postArray))
            $this->name = $postArray['Name'];

        if(array_key_exists("Email",$postArray))
            $this->email = $postArray['Email'];

    }// end of setData() Method



    public function store(){


        $sqlQuery = "INSERT INTO email (name, email, is_trashed) VALUES (? , ?, ?)";
        $dataArray = [ $this->name, $this->email, "NO" ];

        $sth =  $this->dbh->prepare($sqlQuery);

        $status =  $sth->execute($dataArray);


        if($status)
            Message::setMessage("Success! Data has been inserted successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been inserted. <br>");


    }// end of store() Method




    public function index(){

        $sqlQuery = "Select * from email WHERE is_trashed='NO'";


        $sth =  $this->dbh->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData =  $sth->fetchAll();

        return $allData;
    }




    public function trashed(){

        $sqlQuery = "Select * from email WHERE is_trashed <> 'NO'";


        $sth =  $this->dbh->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData =  $sth->fetchAll();

        return $allData;
    }






    public function view(){

        $sqlQuery = "Select * from email where id=".$this->id;



        $sth =  $this->dbh->query($sqlQuery);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData =  $sth->fetch();

        return $oneData;
    }


    public function update(){

        $sqlQuery  = "UPDATE email SET name=?, email = ? WHERE id=".$this->id;



        $dataArray = [$this->name, $this->email];


        $sth = $this->dbh->prepare($sqlQuery);

        $status =  $sth->execute($dataArray);

        if($status)
            Message::setMessage("Success! Data has been updated successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been updated. <br>");


    }


    public function trash()
    {


        $sqlQuery = "UPDATE email SET is_trashed=NOW() WHERE id=" . $this->id;

        $status = $this->dbh->exec($sqlQuery);

        if ($status) {
            Message::setMessage("Success! Data has been trashed successfully. <br>");
            return true;
        } else {

            Message::setMessage("Failed! Data has not been trashed. <br>");
            return false;
        }



    }// end of trash()



    public function trashMultiple($selectedIDs){

        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }

        $status = true;
        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE email SET is_trashed=NOW() WHERE id=$id"  ;

            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }


        if($status)
            Message::message("Success! All Seleted Data Has Been Trashed");
        else
            Message::message("Failed! All Seleted Data Has Not Been Trashed");

    }// end of trashMultiple() Method





    public function recoverMultiple($selectedIDs){

        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }

        $status = true;
        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE email SET is_trashed='NO' WHERE id=$id"  ;

            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }


        if($status)
            Message::message("Success! All Seleted Data Has Been Recovered");
        else
            Message::message("Failed! All Seleted Data Has Not Been Recovered");

    }// end of recoverMultiple() Method



    public function deleteMultiple($selectedIDs){

        if( count($selectedIDs) == 0) {
            Message::message("Empty Selection! Please Select Some Record(s).");
            return;
        }

        $status = true;
        foreach ($selectedIDs as $id){

            $sqlQuery = "DELETE FROM email WHERE id=$id";

            if ( ! $this->dbh-> exec($sqlQuery) )
                $status = false;
        }


        if($status)
            Message::message("Success! All Seleted Data Has Been Deleted");
        else
            Message::message("Failed! All Seleted Data Has Not Been Deleted");

    }// end of deleteMultiple() Method








    public function recover(){


        $sqlQuery = "UPDATE email SET is_trashed='NO' WHERE id=".$this->id;

        $status = $this->dbh->exec($sqlQuery);

        if($status)
            Message::setMessage("Success! Data has been recovered successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been recovered. <br>");



    }// end of recover()



    public function delete(){


        $sqlQuery = "DELETE FROM email WHERE id=".$this->id;

        $status = $this->dbh->exec($sqlQuery);

        if($status)
            Message::setMessage("Success! Data has been deleted successfully. <br>");
        else
            Message::setMessage("Failed! Data has not been deleted. <br>");



    }// end of recover()


    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND (`email` LIKE '%".$requestArray['search']."%' OR `name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byEmail']) && !isset($requestArray['byName']) ) $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND `email` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%'";

        $sth  = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $someData = $sth->fetchAll();

        return $someData;

    }// end of search()


    public function trashedsearch($requestArray){
        $sql = "";
        if( isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND (`email` LIKE '%".$requestArray['trashsearch']."%' OR `name` LIKE '%".$requestArray['trashsearch']."%')";
        if(isset($requestArray['byEmail']) && !isset($requestArray['byName']) ) $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND `email` LIKE '%".$requestArray['trashsearch']."%'";
        if(!isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND `name` LIKE '%".$requestArray['trashsearch']."%'";

        $sth  = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $someData = $sth->fetchAll();

        return $someData;

    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $wordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->email);
        }




        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->email);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $wordArr = explode(" ", $eachString);

            foreach ($wordArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $wordArr = explode(" ", $eachString);

            foreach ($wordArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords

    public function getAllTrashedKeywords()
    {
        $_allKeywords = array();
        $wordsArr = array();

        $allData = $this->trashed();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->email);
        }




        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->email);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $wordArr = explode(" ", $eachString);

            foreach ($wordArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->trashed();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->name);
        }
        //$allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $wordArr = explode(" ", $eachString);

            foreach ($wordArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords


    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);
        if($start<0) $start = 0;
        $sql = "SELECT * from email  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";

        $sth = $this->dbh->query($sql);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $someData  = $sth->fetchAll();
        return $someData;


    }

    public function searchPaginator($page=1,$itemsPerPage=3,$requestArray){


        $start = (($page-1) * $itemsPerPage);
        if($start<0) $start = 0;


        $sql = "";
        if( isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND (`email` LIKE '%".$requestArray['search']."%' OR `name` LIKE '%".$requestArray['search']."%') LIMIT $start,$itemsPerPage";
        if(isset($requestArray['byEmail']) && !isset($requestArray['byName']) ) $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND `email` LIKE '%".$requestArray['search']."%' LIMIT $start,$itemsPerPage";
        if(!isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%' LIMIT $start,$itemsPerPage";


        $sth  = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $someData = $sth->fetchAll();

        return $someData;


    }

    public function trashsearchPaginator($page=1,$itemsPerPage=3,$requestArray){


        $start = (($page-1) * $itemsPerPage);
        if($start<0) $start = 0;


        $sql = "";
        if( isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND (`email` LIKE '%".$requestArray['search']."%' OR `name` LIKE '%".$requestArray['search']."%') LIMIT $start,$itemsPerPage";
        if(isset($requestArray['byEmail']) && !isset($requestArray['byName']) ) $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND `email` LIKE '%".$requestArray['search']."%' LIMIT $start,$itemsPerPage";
        if(!isset($requestArray['byEmail']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `email` WHERE `is_trashed` <>'No' AND `name` LIKE '%".$requestArray['search']."%' LIMIT $start,$itemsPerPage";


        $sth  = $this->dbh->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $someData = $sth->fetchAll();

        return $someData;


    }



    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);
        if($start<0) $start = 0;
        $sql = "SELECT * from email  WHERE is_trashed <> 'NO' LIMIT $start,$itemsPerPage";




        $sth = $this->dbh->query($sql);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $someData  = $sth->fetchAll();
        return $someData;




    }













}// end of Email Class













