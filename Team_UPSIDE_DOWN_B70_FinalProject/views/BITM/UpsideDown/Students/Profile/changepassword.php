<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Students\Students;
use App\Message\Message;
use App\Utility\Utility;

if(isset($_POST['new_password']) &&  isset($_POST['confirm_new_password'])) {

    if($_POST['new_password'] ==  $_POST['confirm_new_password']) {

        $obj = new Students();
        $_POST['email']=$_SESSION['email'];
        $_POST['password'] = $_POST['new_password'];
        $obj->setData($_POST);
        $obj->change_password();

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Password reset has been completed, Please login!
                </div>");
        Utility::redirect('signup.php');
        return;
    }
    else{
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Password doesn't match!
                </div>");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change your password?</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/style.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <li class="dropdown"><a href="../Authentication/logout.php">Logout</a> </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Top content -->
<div class="top-content">
    <div class="container" >
        <table>
            <tr>
                <td width='230' >

                <td width='600' height="50" >


                    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                        <div  id="message" class="form button"   style="font-size: smaller  " >
                            <center>
                                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                    echo "&nbsp;".Message::message();
                                }
                                Message::message(NULL);
                                ?></center>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <br><br> <br><br> <br>
        <div class="row" >
            <div class="col-sm-12">


                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Set a new password and confirm it!</h3>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">

                            <input type="hidden" name="email" value="<?php echo $_GET['email']?>">

                            <div class="form-group">
                                <label class="sr-only" for="new_password">New Password</label>
                                <input type="password" name="new_password" placeholder="New Password" class="form-password form-control" id="form-password">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="new_password">Confirm New Password</label>
                                <input type="password" name="confirm_new_password" placeholder="Confirm New Password" class="form-password form-control" id="form-password">
                            </div>

                            <button type="submit" class="btn">Change</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>
        </div>

    </div>
</div>


<!-- Javascript -->
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery.easing.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/custom.js"></script>

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>

