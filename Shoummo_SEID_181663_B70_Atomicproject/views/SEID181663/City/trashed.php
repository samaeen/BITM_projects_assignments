<?php
ob_start();
require_once ("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
use App\Utility\Utility;
use App\City\City;


$obj = new City();

if(isset($_SESSION['search'])){
    unset($_SESSION['search']);
}

if(isset($_REQUEST['reset'])){
    unset($_SESSION['byName']);
    unset($_SESSION['byCity']);
    unset($_SESSION['trashsearch']);
    unset($_SESSION['ItemsPerPage']);
    unset($_REQUEST['reset']);
}

if (isset($_REQUEST['trashsearch'])) {
    $_SESSION["trashsearch"] = $_REQUEST['trashsearch'];
    unset($_SESSION['byName']);
    unset($_SESSION['byCity']);
}

if (isset($_REQUEST['byName'])) {
    $_SESSION["byName"] = $_REQUEST['byName'];
}

if (isset($_REQUEST['byCity'])) {
    $_SESSION["byCity"] = $_REQUEST['byCity'];
}


if(!isset($_SESSION['trashsearch'])){
    $_SESSION['trashsearch']="";
    $_SESSION['byName']="";
    $_SESSION['byCity']="";
}

################## search  block 1 of 5 start ##################
if( isset($_SESSION['trashsearch']) )$someData =  $obj->trashedsearch($_SESSION);
$availableKeywords=$obj->getAllTrashedKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################



if( isset($_SESSION['trashsearch']) ) {
    $someData = $obj->trashedsearch($_SESSION);
    $allData = $someData;
    $serial = 1;
}
################## search  block 2 of 5 end ##################

######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);



if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;


$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 6;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$someData = $obj->trashsearchPaginator($page,$itemsPerPage,$_SESSION);

$allData = $someData;


$serial = (  ($page-1) * $itemsPerPage ) +1;


if($serial<1) $serial=1;

####################### pagination code block#1 of 2 end #########################################



################## search  block 2 of 5 start ##################







?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>


    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">




    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.css">
    <script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->



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
                        <li><a href="index.php">Active List</a></li>
                        <li><a href="trashed.php">Trashed List</a></li>
                        <li><a href="create.php">Add New Data</a></li>
                        <li><a href="pdf.php">Download as PDF</a></li>
                        <li><a href="xl.php">Download as XL</a></li>
                        <li><a href="email.php">Email to a friend</a></li>
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



    <div  class="container">


        <!-- required for search, block 4 of 5 start -->

        <div style="margin-left: 60%; height: 80px;">


            <script type="text/javascript">
                function checkForm(form) {
                    if(!form.byCity.checked && !form.byName.checked){
                        alert("Please select atleast one search catagory");
                        form.byCity.focus();
                        form.byName.focus();
                        return false;
                    }
                    return true;
                }

            </script>

            <form id="searchForm" action="trashed.php"  method="get" style="margin-top: 5px; margin-bottom: 10px " onsubmit="return checkForm(this);">
                <input type="text" value="" id="searchID" name="trashsearch" placeholder="Search" width="60" >
                <input type="checkbox"  name="byCity"   checked  >By City
                <input type="checkbox"  name="byName"  checked >By Name
                <input hidden type="submit" class="btn-primary" value="trashsearch">
            </form>
        </div>

        <!-- required for search, block 4 of 5 end -->


        <form id="multiple"  method="post">



            <div class="bg-default text-center"><h4><u>City info - Trash list</u></h4></div>

            <div class="nav navbar-light">


                <button id="RecoverSelected" class='btn btn-lg btn-default'>Recover Selected</button>

                <button id="DeleteSelected" class='btn btn-lg btn-default'>Delete Selected</button>


            </div>

            <div class="bg-default text-center"><h4> </h4></div>

            <table border="1px" class="table table-bordered table-striped">

                <tr>
                    <th>Select all  <input id='select_all' type='checkbox' value='select all'></th>

                    <th> Serial </th>
                    <th> ID </th>
                    <th> Name </th>
                    <th> City </th>
                    <th> Action Buttons </th>

                </tr>

                <?php


                // $serial=1;

                foreach ($allData as $oneData){

                    if($serial%2) $bgColor = "#e4e4e4";
                    else $bgColor = "#ffffff";

                    echo "
    
                                  <tr  style='background-color: $bgColor'>
    
                                     <td style='padding-left: 4%'><input type='checkbox' class='checkbox' name='mark[]' value='$oneData->id'></td>
    
                                     <td style='width: 10%; text-align: center'>$serial</td>
                                     <td style='width: 10%; text-align: center'>$oneData->id</td>
                                     <td style='width: 20%;'>$oneData->name</td>
                                     <td>$oneData->city</td>
    
                                     <td>
                                       <a href='view.php?id=$oneData->id' class='btn btn-default'>View</a>
                                       <a href='edit.php?id=$oneData->id' class='btn btn-default'>Edit</a>
                                       <a href='recover.php?id=$oneData->id' class='btn btn-default'>Recover</a>
                                       <a href='delete.php?id=$oneData->id' onclick='return doConfirm()' class='btn btn-default'>Delete</a>
                                       <a href='email.php?id=$oneData->id' class='btn btn-default'>Email</a>
    
                                     </td>
                                  </tr>
                              ";
                    $serial++;

                }

                ?>

            </table>

        </form>



        <!--  ######################## pagination code block#2 of 2 start ###################################### -->
        <div align="left" class="container">
            <ul class="pagination">

                <?php

                $pageMinusOne  = $page-1;
                $pagePlusOne  = $page+1;


                if($page>$pages) Utility::redirect("trashed.php?Page=$pages");

                if($page>1)  echo "<li><a href='trashed.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";


                for($i=1;$i<=$pages;$i++)
                {
                    if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                    else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

                }
                if($page<$pages) echo "<li><a href='trashed.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

                ?>

                <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                    <?php
                    if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                    if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                    else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                    if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                    if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                    if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                    if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                    else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                    ?>
                </select>
            </ul>
        </div>
        <!--  ######################## pagination code block#2 of 2 end ###################################### -->

        <?php

        if ($_SESSION['trashsearch']==""){

        }
        else{
            echo ('<div align="center" class="container">

        <form action="trashed.php" method="get">

            <input type="submit" value="Back to main list" name="reset" class="btn bg-primary">

        </form>
        
    </div>');
        }


        ?>









    </div>






    <script>


        $(document).ready(function () {




            $("#RecoverSelected").click(function () {
                $("#multiple").attr('action', 'recover_selected.php');
                $("#multiple").submit();
            });




            $("#DeleteSelected").click(function () {
                $("#multiple").attr('action', 'delete_selected.php');
                $("#multiple").submit();
            });


        });



        function doConfirm() {

            var result = confirm("Are you sure you want to delete?");

            return result;


        }


        $(function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        });




        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

//check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });



    </script>





    <!-- required for search, block 5 of 5 start -->
    <script>

        $(function() {
            var availableTags = [

                <?php
                echo $comma_separated_keywords;
                ?>
            ];
            // Filter function to search only from the beginning of the string
            $( "#searchID" ).autocomplete({
                source: function(request, response) {

                    var results = $.ui.autocomplete.filter(availableTags, request.term);

                    results = $.map(availableTags, function (tag) {
                        if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                            return tag;
                        }
                    });

                    response(results.slice(0, 15));

                }
            });


            $( "#searchID" ).autocomplete({
                select: function(event, ui) {
                    $("#searchID").val(ui.item.label);
                    $("#searchForm").submit();
                }
            });


        });

    </script>
    <!-- required for search, block5 of 5 end -->



    <?php
    ob_end_flush();
    ?>

    <script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>