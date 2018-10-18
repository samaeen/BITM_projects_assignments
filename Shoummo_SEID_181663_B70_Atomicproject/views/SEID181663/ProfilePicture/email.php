<?php

######## PLEASE PROVIDE Your Gmail Info. -  (ALLOW LESS SECURE APP ON GMAIL SETTING ) ########

$yourGmailAddress = 'buysellzone2015@gmail.com';
$yourGmailPassword = '%$#AirGold96';


##############################################################################################

session_start();
include_once('../../../vendor/autoload.php');
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';

use App\ProfilePicture\ProfilePicture;
use App\Message\Message;

$obj = new ProfilePicture();
$th = "

          <th style='width: 10%; text-align: center'>Serial Number</th>
            <th style='width: 10%; text-align: center'>ID</th>
            <th>Name</th>
            <th>Profile Picture</th>

    ";
$fileResource=fopen("content.html","w+");

if(!isset($_REQUEST['id'])) {
    $list = 1;
    $allData = $obj->index();
    $serial = 1;

    $th = "

          <th style='width: 10%; text-align: center'>Serial Number</th>
            <th style='width: 10%; text-align: center'>ID</th>
            <th>Name</th>
            <th>Profile Picture</th>

    ";

    fwrite($fileResource,$th);


    foreach($allData as $oneData){ ########### Traversing $someData is Required for pagination  #############

        if($serial%2) $bgColor = "AZURE";
        else $bgColor = "#ffffff";

        $tr= "

                  <tr  style='background-color: $bgColor'>


                     <td style='width: 10%; text-align: center'>$serial</td>
                     <td style='width: 10%; text-align: center'>$oneData->id</td>
                     <td>$oneData->name</td>

                      <td >
                         <img src='Uploads/$oneData->profile_picture'  style='width:120px;height:100px; border-radius: 10px'>



                      </td>


                  </tr>
              ";

        fwrite($fileResource,$tr);

        $serial++;
    }


}
else {
    $list= 0;
    $obj->setData($_REQUEST);
    $oneData = $obj->view();
    $serial =1;
    $tr= "

                  <tr  style='background-color: AZURE'>


                     <td style='width: 10%; text-align: center'>$serial</td>
                     <td style='width: 10%; text-align: center'>$oneData->id</td>
                     <td>$oneData->name</td>

                      <td >
                         <img src='Uploads/$oneData->profile_picture'  style='width:120px;height:100px; border-radius: 10px'>



                      </td>


                  </tr>
              ";

    fwrite($fileResource,$tr);
}









?>



<!DOCTYPE html>

<head>
    <title>Email This To A Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>


    <script src="../../../resources/tinymce/tinymce.min.js"></script>

    <script>tinymce.init({
            selector: 'textarea',  // change this value according to your HTML

            menu: {
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                tools: {title: 'Tools', items: 'spellchecker code'}

            }
        });


    </script>


</head>

<body>

<div style="height: 20px">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid" style="height: 20px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Atomic Project</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Birthdate"  class="active">Birthdate
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Birthdate/index.php">Active List</a></li>
                        <li><a href="../Birthdate/trashed.php">Trashed List</a></li>
                        <li><a href="../Birthdate/create.php">Add New Data</a></li>
                        <li><a href="../Birthdate/pdf.php">Download as PDF</a></li>
                        <li><a href="../Birthdate/xl.php">Download as XL</a></li>
                        <li><a href="../Birthdate/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../BookTitle">BookTitle
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../BookTitle/index.php">Active List</a></li>
                        <li><a href="../BookTitle/trashed.php">Trashed List</a></li>
                        <li><a href="../BookTitle/create.php">Add New Data</a></li>
                        <li><a href="../BookTitle/pdf.php">Download as PDF</a></li>
                        <li><a href="../BookTitle/xl.php">Download as XL</a></li>
                        <li><a href="../BookTitle/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Gender">Gender
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Gender/index.php">Active List</a></li>
                        <li><a href="../Gender/trashed.php">Trashed List</a></li>
                        <li><a href="../Gender/create.php">Add New Data</a></li>
                        <li><a href="../Gender/pdf.php">Download as PDF</a></li>
                        <li><a href="../Gender/xl.php">Download as XL</a></li>
                        <li><a href="../Gender/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Email">Email
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Email/index.php">Active List</a></li>
                        <li><a href="../Email/trashed.php">Trashed List</a></li>
                        <li><a href="../Email/create.php">Add New Data</a></li>
                        <li><a href="../Email/pdf.php">Download as PDF</a></li>
                        <li><a href="../Email/xl.php">Download as XL</a></li>
                        <li><a href="../Email/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../ProfilePicture">Profile Pic
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">Active List</a></li>
                        <li><a href="trashed.php">Trashed List</a></li>
                        <li><a href="create.php">Add New Data</a></li>
                        <li><a href="pdf.php">Download as PDF</a></li>
                        <li><a href="xl.php">Download as XL</a></li>
                        <li><a href="email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Hobbies">Hobby
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Hobbies/index.php">Active List</a></li>
                        <li><a href="../Hobbies/trashed.php">Trashed List</a></li>
                        <li><a href="../Hobbies/create.php">Add New Data</a></li>
                        <li><a href="../Hobbies/pdf.php">Download as PDF</a></li>
                        <li><a href="../Hobbies/xl.php">Download as XL</a></li>
                        <li><a href="../Hobbies/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../City">City
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../City/index.php">Active List</a></li>
                        <li><a href="../City/trashed.php">Trashed List</a></li>
                        <li><a href="../City/create.php">Add New Data</a></li>
                        <li><a href="../City/pdf.php">Download as PDF</a></li>
                        <li><a href="../City/xl.php">Download as XL</a></li>
                        <li><a href="../City/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../SOG">Summary
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../SOG/index.php">Active List</a></li>
                        <li><a href="../SOG/trashed.php">Trashed List</a></li>
                        <li><a href="../SOG/create.php">Add New Data</a></li>
                        <li><a href="../SOG/pdf.php">Download as PDF</a></li>
                        <li><a href="../SOG/xl.php">Download as XL</a></li>
                        <li><a href="../SOG/email.php">Email to a friend</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div>


<div class="container">
    <h2>Email This To A Friend</h2>
    <form  role="form" method="post" action="email.php<?php if(isset($_REQUEST['id'])) echo "?id=".$_REQUEST['id']; else echo "?list=1";?>">
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text"  name="name"  class="form-control" id="name" placeholder="Enter name of the recipient ">
            <label for="Email">Email Address:</label>
            <input type="text"  name="email"  class="form-control" id="email" placeholder="Enter recipient email address here...">

            <label for="Subject">Subject:</label>
            <input type="text"  name="subject"  class="form-control" id="subject" value="<?php if($list){echo "List of profile recommendation";} else {echo "A single profile recommendation";} ?>">
            <label for="body">Body:</label>

            <textarea   rows="8" cols="160"  name="body" >
<?php
if($list){

    $trs="";
    $sl=0;

    printf("<table><tr> <td width='50'><strong>Serial</strong></td><td width='50'><strong>ID</strong></td><td width='250'><strong>Name</strong></td><td width='250'><strong>Profile Picture</strong></td></tr>");

    foreach($allData as $row) {

        $id = $row->id;
        $name = $row->name;
        $profilePicture = $row->profile_picture;

        $sl++;
        printf("<tr><td width='50'>%d</td><td width='50'>%d</td><td width='250'>%s</td><td width='250'>%s</td></tr>",$sl,$id,$name,$profilePicture);


    }
    printf("</table>");

}
else
{
    printf("I'm recommending You: <strong>Profile ID: </strong>%s <br><strong>Name: </strong>%s <br> <strong>Profile Picture: </strong> <br> <img src='image/%s' height='100px' width='100px'> ",$oneData->id,$oneData->name,$oneData->profile_picture);

}
?>
            </textarea>

        </div>

        <input class="btn-lg btn-primary" type="submit" value="Send Email">

    </form>


    <?php


    if(isset($_REQUEST['email'])&&isset($_REQUEST['subject'])) {

        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587; //587
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls'; //tls
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $yourGmailAddress;
        //Password to use for SMTP authentication
        $mail->Password = $yourGmailPassword;
        //Set who the message is to be sent from
        $mail->setFrom($yourGmailAddress, 'BITM PHP');
        //Set an alternative reply-to address
        $mail->addReplyTo($yourGmailAddress, 'BITM PHP');
        //Set who the message is to be sent to

        //echo $_REQUEST['email']; die();

        $mail->addAddress($_REQUEST['email'], $_REQUEST['name']);
        //Set the subject line
        $mail->Subject = $_REQUEST['subject'];
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        //   $mail->AltBody = 'This is a plain-text message body';

        // $mail->Body = $_REQUEST['body'];

        $html = file_get_contents("content.html");
        $mail->msgHTML($html, dirname(__FILE__));

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            Message::message("<strong>Success!</strong> Email has been sent successfully.");

            ?>
            <script type="text/javascript">
                window.location.href = 'index.php';
            </script>
            <?php


        }

    }




    ?>



</div>

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>


</html>