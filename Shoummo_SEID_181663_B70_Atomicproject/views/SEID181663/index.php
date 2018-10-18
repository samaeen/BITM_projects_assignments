<?php
require_once ("../../vendor/autoload.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atomic Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts --

    <!-- Theme CSS -->
    <link href="../../resources/startpage/start.min.css" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid" style="height: 20px;">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Atomic Project</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="Birthdate"  class="active">Birthdate
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="Birthdate/index.php">Active List</a></li>
                    <li><a href="Birthdate/trashed.php">Trashed List</a></li>
                    <li><a href="Birthdate/create.php">Add New Data</a></li>
                    <li><a href="Birthdate/pdf.php">Download as PDF</a></li>
                    <li><a href="Birthdate/xl.php">Download as XL</a></li>
                    <li><a href="Birthdate/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="BookTitle">BookTitle
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="BookTitle/index.php">Active List</a></li>
                    <li><a href="BookTitle/trashed.php">Trashed List</a></li>
                    <li><a href="BookTitle/create.php">Add New Data</a></li>
                    <li><a href="BookTitle/pdf.php">Download as PDF</a></li>
                    <li><a href="BookTitle/xl.php">Download as XL</a></li>
                    <li><a href="BookTitle/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="Gender">Gender
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="Gender/index.php">Active List</a></li>
                    <li><a href="Gender/trashed.php">Trashed List</a></li>
                    <li><a href="Gender/create.php">Add New Data</a></li>
                    <li><a href="Gender/pdf.php">Download as PDF</a></li>
                    <li><a href="Gender/xl.php">Download as XL</a></li>
                    <li><a href="Gender/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="Email">Email
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="Email/index.php">Active List</a></li>
                    <li><a href="Email/trashed.php">Trashed List</a></li>
                    <li><a href="Email/create.php">Add New Data</a></li>
                    <li><a href="Email/pdf.php">Download as PDF</a></li>
                    <li><a href="Email/xl.php">Download as XL</a></li>
                    <li><a href="Email/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="ProfilePicture">Profile Pic
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="ProfilePicture/index.php">Active List</a></li>
                    <li><a href="ProfilePicture/trashed.php">Trashed List</a></li>
                    <li><a href="ProfilePicture/create.php">Add New Data</a></li>
                    <li><a href="ProfilePicture/pdf.php">Download as PDF</a></li>
                    <li><a href="ProfilePicture/xl.php">Download as XL</a></li>
                    <li><a href="ProfilePicture/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="Hobbies">Hobby
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="Hobbies/index.php">Active List</a></li>
                    <li><a href="Hobbies/trashed.php">Trashed List</a></li>
                    <li><a href="Hobbies/create.php">Add New Data</a></li>
                    <li><a href="Hobbies/pdf.php">Download as PDF</a></li>
                    <li><a href="Hobbies/xl.php">Download as XL</a></li>
                    <li><a href="Hobbies/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="City">City
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="City/index.php">Active List</a></li>
                    <li><a href="City/trashed.php">Trashed List</a></li>
                    <li><a href="City/create.php">Add New Data</a></li>
                    <li><a href="City/pdf.php">Download as PDF</a></li>
                    <li><a href="City/xl.php">Download as XL</a></li>
                    <li><a href="City/email.php">Email to a friend</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="SOG">Summary
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="SOG/index.php">Active List</a></li>
                    <li><a href="SOG/trashed.php">Trashed List</a></li>
                    <li><a href="SOG/create.php">Add New Data</a></li>
                    <li><a href="SOG/pdf.php">Download as PDF</a></li>
                    <li><a href="SOG/xl.php">Download as XL</a></li>
                    <li><a href="SOG/email.php">Email to a friend</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


<!--Entire thing is a canvas-->

<!-- jQuery -->
<script src="../../resources/jquery/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- P5 js -->
<script src="../../resources/P5/p5.min.js"></script>

<!--p5 js code-->
<script src="../../resources/P5/p5_theme.js">


<!-- Theme JavaScript -->
<script src="../../resources/startpage/start.min.css"></script>

</body>

</html>
