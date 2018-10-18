<?php
$gmailAddress = "bitmphp.b70.ctg@gmail.com";
$gmailPassword = "b70bitmphp";


if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Students\Students;
use App\Message\Message;
use App\Utility\Utility;


if(isset($_POST['email'])) {
    $obj= new Students();

    $myHostIP= gethostbyname(gethostname());




    $singleStudents =  $obj->setData($_POST)->view();



    $passwordResetLink= $singleStudents->password ;

    require '../../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->addAddress($_POST['email']);
    $mail->Username=$gmailAddress;
    $mail->Password=$gmailPassword;
    $mail->setFrom($gmailAddress,'Students Management');
    $mail->addReplyTo($gmailAddress,"Students Management");
    $mail->Subject    = "Your Password Reset Link";
    $message =  "Please click this link to reset your password: 
       http://".$myHostIP."/Team_UPSIDE_DOWN_B70_FinalProject/views/BITM/UpsideDown/Students/Profile/resetpassword.php?email=".$_POST['email']."&code=".$singleStudents->password;
    $mail->msgHTML($message);
    if($mail->send()){

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Email Sent!</strong> Please check your email for password reset link.
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
    <title>Need help with your password?</title>

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
            </ul>
        </div>
    </div>
</nav>

<!-- Top content -->
<div class="top-content" style="padding-top: 60px">
    <div class="container" style="padding-top: 60px">
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
                            <p>Please provide us your varified email</p>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>

                            <button type="submit" class="btn"> Send Me The Password Reset Link</button>
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
    $('.alert').slideDown("slow").delay(10000).slideUp("slow");
</script>

</html>

