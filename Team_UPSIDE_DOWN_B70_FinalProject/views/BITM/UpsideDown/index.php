<?php

?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/style.css">
</head>

<body>

<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">UPSIDE<span>DOWN</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Students/Profile/signup.php">Student Area</a></li>
                <li><a href="Teachers/Profile/signup.php">Teachers Area</a></li>
                <li><a href="Courses/courses.php">Courses</a></li>
                <li class="btn-trial"><a href="#footer">Page Bottom</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Navigation bar-->


<!--Banner-->
<div class="banner" style="height: 750px">
    <div class="bg-color" style="height: 750px">
        <div class="container">
            <div class="row">
                <div class="banner-text text-center">
                    <div class="text-border">
                        <h2 class="text-dec">E-Classroom</h2>
                    </div>
                    <div class="intro-para text-center quote">
                        <p class="big-text">Learn Today. Lead Tomorrow.</p>
                        <p class="small-text">Have your classes anytime<br>Be connected anytime.</p>
                        <a href="#student" class="btn get-quote">Student</a>
                        <a href="#teacher" class="btn get-quote">Teacher</a><br>
                        <a href="#student" class="btn get-quote">Sign up now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Banner-->

<div class="top-content" id="student">
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

        <div class="row" >

            <div style="text-align: center"><h3>Are you a student?</h3></div>
            <br>
            <br>

            <div class="col-sm-5">


                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h4>LOGIN</h4>
                            <p>Enter username and password:</p>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="Students/Authentication/login.php" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Sign in!</button>
                        </form>
                        <a href="Students/Profile/forgotten.php">Forgot Password?</a>
                    </div>
                </div>


            </div>

            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h4>SIGN UP</h4>
                            <p>Fill in the form below:</p>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="Students/Profile/registration.php" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-first_name">First name</label>
                                <input type="text" name="first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Last name</label>
                                <input type="text" name="last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-course">Course</label>
                                <select name="course">
                                    <option value="">Select Course</option>
                                    <option value="C">C Programming</option>
                                    <option value="Java">Java</option>
                                    <option value="Python">Python</option>
                                    <option value="HTML">HTML</option>
                                    <option value="PHP">PHP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="profile_pic">Profile Picture</label>
                                <input type="file" class="form-control" name="File2Upload" required="">
                            </div>

                            <button type="submit" class="btn">Sign me up!</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<hr>
<hr>

<div class="top-content" id="teacher">
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

        <div class="row" >

            <div style="text-align: center"><h3>Are you a teacher?</h3></div>
            <br>
            <br>

            <div class="col-sm-5">


                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h4>LOGIN</h4>
                            <p>Enter username and password:</p>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="../Authentication/login.php" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Sign in!</button>
                        </form>
                        <a href="forgotten.php">Forgot Password?</a>
                    </div>
                </div>


            </div>

            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h4>SIGN UP</h4>
                            <p>Fill in the form below:</p>
                        </div>

                    </div>
                    <div class="form-bottom">
                        <form role="form" action="Students/Profile/registration.php" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-first_name">First name</label>
                                <input type="text" name="first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Last name</label>
                                <input type="text" name="last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-course">Course</label>
                                <select name="course">
                                    <option value="">Select Course</option>
                                    <option value="C">C Programming</option>
                                    <option value="Java">Java</option>
                                    <option value="Python">Python</option>
                                    <option value="HTML">HTML</option>
                                    <option value="PHP">PHP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="ProfilePicture">Profile Picture</label>
                                <input type="file" class="form-control" name="File2Upload" required="">
                            </div>

                            <button type="submit" class="btn">Sign me up!</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!--Cta-->
<section id="cta-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Subscribe Now</h2>
                <p class="cta-2-txt">Sign up for our courses, we’ll send them right to your inbox.</p>
                <div class="cta-2-form text-center">
                    <form action="#" method="post" id="workshop-newsletter-form">
                        <input name="" placeholder="Enter Your Email Address" type="email">
                        <input class="cta-2-form-submit-btn" value="Subscribe" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Cta-->
<!--work-shop-->
<section id="work-shop" class="section-padding">
    <div class="container">

        <div class="header-section text-center">
            <h2>Our Courses</h2>
            <hr class="bottom-line">
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="service-box text-center">
                    <div class="icon-box">
                        <i class="fa fa-html5 color-green"></i>
                    </div>
                    <div class="icon-text">
                        <h4 class="ser-text">C Programming</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-box text-center">
                    <div class="icon-box">
                        <i class="fa fa-css3 color-green"></i>
                    </div>
                    <div class="icon-text">
                        <h4 class="ser-text">Java Development</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-box text-center">
                    <div class="icon-box">
                        <i class="fa fa-joomla color-green"></i>
                    </div>
                    <div class="icon-text">
                        <h4 class="ser-text">Python</h4>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="service-box text-center">
                    <div class="icon-box">
                        <i class="fa fa-html5 color-green"></i>
                    </div>
                    <div class="icon-text">
                        <h4 class="ser-text">Web Designing</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-box text-center">
                    <div class="icon-box">
                        <i class="fa fa-css3 color-green"></i>
                    </div>
                    <div class="icon-text">
                        <h4 class="ser-text">Web App Development</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--/ work-shop-->




<!--Footer-->
<footer id="footer" class="footer">
    <div class="container text-center">


        <form class="mc-trial row">
            <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
                <div class=" controls">
                    <input name="name" placeholder="Enter Your Name" class="form-control" type="text">
                </div>
            </div><!-- End email input -->
            <div class="form-group col-md-3 col-sm-4">
                <div class=" controls">
                    <input name="EMAIL" placeholder="Enter Your email" class="form-control" type="email">
                </div>
            </div><!-- End email input -->
            <div class="col-md-2 col-sm-4">
                <p>
                    <button name="submit" type="submit" class="btn btn-block btn-submit">
                        Submit <i class="fa fa-arrow-right"></i></button>
                </p>
            </div>
        </form><!-- End newsletter-form -->
        <ul class="social-links">
            <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
        </ul>
        Fahim Faisal. All rights reserved ©2017
    </div>
</footer>
<!--/ Footer-->


<!-- Javascript -->
<script src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../../resources/bootstrap-3.3.7-dist/js/jquery.easing.min.js"></script>
<script src="../../../resources/bootstrap-3.3.7-dist/js/custom.js"></script>



</body>


</html>
