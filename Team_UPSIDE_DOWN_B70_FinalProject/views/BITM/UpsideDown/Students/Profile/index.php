<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Students\Students;
use App\Students\Auth;
use App\Message\Message;
use App\Utility\Utility;

if(isset($_SESSION['student'])) {
    $obj= new Students();
    $obj->setData($_SESSION);
    $singleUser = $obj->view();

    $auth= new Auth();
    $status = $auth->setData($_SESSION)->logged_in();

    if(!$status) {
        Utility::redirect('signup.php');
        return;
    }
}
else{
    Utility::redirect('signup.php');
    return;
}



?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/style.css">
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

<div class="container" style="padding-top: 40px">

    <table align="center">
        <tr>
            <td height="100" >

                <div id="message" >

                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                        echo "&nbsp;".Message::message();
                    }
                    Message::message(NULL);

                    ?>
                </div>

            </td>
        </tr>
    </table>

</div>

<div class="container" style="text-align: center">
    <h4>Courses you applied for:</h4>
    <a href="#"><div class="col-md-4 col-sm-6">
            <div class="service-box text-center">
                <div class="icon-box">
                    <i class="fa fa-joomla color-green"></i>
                </div>
                <div class="icon-text">
                    <h4 class="ser-text"><?php echo $singleUser->course;?></h4>
                </div>
                <div class="icon-text">
                    <h4><a href="live.php" class="btn-trial">Join Class Now</a></h4>
                </div>
            </div>
        </div></a>

</div>


<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery.easing.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/custom.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>
