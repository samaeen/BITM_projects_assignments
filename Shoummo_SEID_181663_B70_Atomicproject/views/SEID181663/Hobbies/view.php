<?php

require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Hobbies\Hobbies;

$obj = new Hobbies();
$obj->setData($_GET);

$oneData  =  $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>



    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.css">
    <script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.js"></script>




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
                        <li><a href="../ProfilePicture/index.php">Active List</a></li>
                        <li><a href="../ProfilePicture/trashed.php">Trashed List</a></li>
                        <li><a href="../ProfilePicture/create.php">Add New Data</a></li>
                        <li><a href="../ProfilePicture/pdf.php">Download as PDF</a></li>
                        <li><a href="../ProfilePicture/xl.php">Download as XL</a></li>
                        <li><a href="../ProfilePicture/email.php">Email to a friend</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="../Hobbies">Hobby
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


    <div id="MessageShowDiv" style="height: 60px; padding-top: 40px;">
        <div id="message" class="btn-info text-center" >
            <?php
            if(isset($_SESSION['message'])){
                echo Message::message();
            }
            ?>
        </div>
    </div>

<div class="container" style="padding-top: 50px;">


<?php

         echo "
             <h1> Single Profile Information </h1>
               
             <table class='table table-bordered table-striped'>
             
                    <tr>                   
                        <td>  <b>ID</b>  </td>                
                        <td>  <b>$oneData->id</b>  </td>                
                      
                    </tr>
        
                     <tr>                   
                        <td>  <b>Name</b>  </td>                
                        <td>  <b>$oneData->name</b>  </td>                
                      
                    </tr>       
                      
                      <tr>                   
                        <td>  <b>Hobbies</b>  </td>                
                        <td>  <b>$oneData->hobbies</b>  </td>                
                      
                    </tr>
                         
                   
                    
                    <tr>                  
                        <td class='text-center' colspan='2'>  <a class='btn bg-primary' href='index.php'> Back to Active List</a> </td>
                    </tr>
                
             
             </table>
             
             
             

         ";


?>

</div>

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>