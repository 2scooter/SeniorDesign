<?php session_start();
include('loginscript.php');
if(isset($_SESSION['identifier']))
{
    
}
else
    header('Location: login.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/common.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <img id="logo" src="images/logo.png"/>
            <div id="heads">
                <div id="headerText">
                    Regional Science and Engineering Challenge
                </div>
                <div id="whiteline" style="height:2px; background-color: white; width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>
            </div>
            <div id="tabspace"></div>

        <div id="Main">
            <div id="tabs">
                <ul id="tabslist">
                    <li id="tabHeader_1" tab = "1">
                        <tab><a style="text-decoration: none;" href="index.php">Home</a></tab>
                    </li>
                    <li id="tabHeader_2" tab = "1">
                        <tab><a style="color:tomato; text-decoration: none;" href="presentation.php">Presentation</a></tab>
                    </li>
                    <li id="tabHeader_3" tab = "1">
                        <tab><a style="text-decoration: none;" href="test.php">Test</a></tab>
                    </li>
                    <li tab = "0">
                        <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1); setLeft()" onmouseout="ddMenu('one',-1)"><a style="text-decoration: none;">Administration</a></dt>
                    </li>
                    <li>
                        <tab><a style="text-decoration: none;" href="contact.php">Contact Us</a></tab>
                    </li>
                </ul>
                <div id="dropdown">
                    <div id="one-ddcontainer">
                        <dl class="dropdown">
                            <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                                <div id="whiteLine" style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                                <ul style="margin-left:-425px;">
                                    <li id="tabHeader_7" tab = "1"><a style="text-decoration: none;" href="judges.php">View Judges</a></li>
                                    <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                    <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;">Edit Presentation</a></li>
                                    <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;">Edit Test</a></li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div id="content">
                <div id="content_inner">
                    <div id="myCarousel" class="carousel slide" height="inherit">
                        <div class="carousel-inner" height="inherit">
                        
                            <?php
                             $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
                             if (mysqli_connect_errno($con))
                             {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                             }
                             $result = mysqli_query($con,"SELECT * FROM presentation");
                             $count = 0;
                             while($row = mysqli_fetch_array($result))
                             {
                              if($count == 0)
                              {
                                  echo '<div class = "item active" height = "inherit">';
                              }
                              else
                                echo '<div class = "item">';
                              echo '<img id="slide" src=' . $row['imageurl'] . '>';
                              echo '</div>';
                              $count++;
                             }
                            
                            ?>

                            <!--
                            <div class="item active" height="inherit">
                                <img id="slide" src="images/m1/Slide1.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide2.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide3.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide4.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide5.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide6.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide7.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide8.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide9.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide10.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide11.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide12.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide13.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide14.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide15.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide16.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide17.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide18.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide19.PNG"/>
                            </div>
                            <div class="item">
                                <img id="slide" src="images/m1/Slide20.PNG"/>                                
                            </div>
                            -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" data-slide="prev" style="margin-top: -100px; margin-left: 280px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Previous</a>
            <a href="#myCarousel" data-slide="next" style="margin-top: -100px; margin-left: 374px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Next</a>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/dropdown.js"></script>
        <script src="js/presentation.js"></script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-1332079-8']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>

