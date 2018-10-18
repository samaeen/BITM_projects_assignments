<?php
namespace App\Students;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Students extends DB{
    public $table="students";
    public $firstName="";
    public $lastName="";
    public $email="";
    public $profile_pic="";
    public $password="";
    public $course="";
    public $id="";
    public $email_token="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('first_name',$data)){
            $this->firstName=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->lastName=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('profile_pic',$data)){
            $this->profile_pic=$data['profile_pic'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('course',$data)){
            $this->course=$data['course'];
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }


        return $this;
    }





    public function store() {


       $dataArray= array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':profile_pic'=>$this->profile_pic,':password'=>$this->password,':course'=>$this->course,':email_token'=>$this->email_token);


        $query="INSERT INTO students (`first_name`, `last_name`, `email`,`password`, `profile_picture`,`course`,`email_verified`) 
VALUES (:firstName, :lastName, :email, :password, :profile_pic, :course, :email_token)";

        $sth=$this->conn->prepare($query);

        $result = $sth->execute($dataArray);
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `e_classroom`.`students` SET `password`=:password  WHERE `users`.`email` =:email";
        $sth=$this->conn->prepare($query);
        $result = $sth->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $query=" SELECT * FROM students WHERE email = '$this->email' ";
       // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `e_classroom`.`students` SET  `email_verified`='".'Yes'."' WHERE `users`.`email` ='$this->email'";
        $sth=$this->conn->prepare($query);
        $result = $sth->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../../views/BITM/TeamName/User/Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `ums`.`users` SET `first_name`=:firstName, `last_name` =:lastName ,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `users`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':phone'=>$this->phone,
 ':address'=>$this->address,':email_token'=>$this->email_token));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

}

