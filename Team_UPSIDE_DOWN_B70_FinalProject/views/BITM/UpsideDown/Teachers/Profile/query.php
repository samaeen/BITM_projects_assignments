<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Teachers\Teachers;
use App\Teachers\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new Teachers();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in();

if( !isset($_SESSION['chatNick']) || empty($_SESSION['chatNick']) ){

    $_SESSION['chatNick']=$singleUser->first_name."&nbsp".$singleUser->last_name;

}

if(!$status) {
    Utility::redirect('signup.php');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>


    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/style.css">

    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <title></title>


</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../index.php">UPSIDE<span>DOWN</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../../Students/Profile/signup.php">Student Area</a></li>
                <li><a href="../../Teachers/Profile/signup.php">Teachers Area</a></li>
                <li><a href="../../Courses/courses.php">Courses</a></li>
                <li>       </li>
                <li class="dropdown"><a class="dropdown-toggle" href="profile.php"><?php echo "Hello, "."$singleUser->first_name"; ?> </a></li>
                <li class="dropdown"><a href="../Authentication/logout.php">Logout</a> </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="padding-top: 100px">
    <?php


    if(isset($_POST['msg']) && !empty($_POST['msg'])){

        $str =  "<".$_SESSION['chatNick']."> : " . $_POST['msg'] . "\n";

        file_put_contents("conversation.txt",$str,FILE_APPEND);

    }



        echo "Welcome ".$_SESSION['chatNick']. "!<br>";

        $conversation = file_get_contents("conversation.txt");

        echo "<textarea id='chatHistory' rows='10' cols='80'>$conversation</textarea>";


        echo "
            <form action='' method='post'>                                
                  <input type='text' name='msg' size='80'> 
                  <input type='submit' value='Send' onclick='loadDoc()'>                            
             </form>
                         
         ";


    ?>
</div>





<script>
    setTimeout(function()
    {
        var textArea = document.getElementById('chatHistory');
        textArea.scrollTop = textArea.scrollHeight-200;
    }, 300);
    setInterval(function () {
        loadDoc();
    },800);
    function loadDoc() {
        var xhttp;
        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("chatHistory").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "conversation.txt", true);
        xhttp.send();
    }

</script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery.easing.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/custom.js"></script>
</body>
</html>