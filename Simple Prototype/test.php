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
                <div id="whiteline" style="height:2px; background-color : white;width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>
            </div>
        </div>
        <div id="tabspace"></div>

        <div id="Main">
            <div id="tabs">
                <ul id="tabslist">
                    <li id="tabHeader_1" tab = "1">
                        <tab><a style="text-decoration: none;" href="index.php">Home</a></tab>
                    </li>
                    <li id="tabHeader_2" tab = "1">
                        <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
                    </li>
                    <li id="tabHeader_3" tab = "1">
                        <tab><a style="color:tomato; text-decoration: none;" href="test.php">Test</a></tab>
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
                                    <li id="tabHeader_7" tab = "1"><a href="judges.php">View Judges</a></li>
                                    <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                    <li id="tabHeader_9" tab = "1"><a>Edit Presentation</a></li>
                                    <li id="tabHeader_10" tab = "1"><a>Edit Test</a></li>
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
                            <div class="item active" height="inherit">
                                <h1>Question 1</h1>
                                <p>
                                    <font size="6"> When introducing yourself to the student, you should?</font>
                                </p>

                                <div>
                                    <input type="radio" name="group1" value="A">
                                    Use your full name and title(s) to emphasize your expertise.<br>
                                    <br>
                                    <input type="radio" name="group1" value="B">
                                    Warmly greet the student, introduce yourself by first and last name, and express
                                    an interest in his/her project.<br>
                                    <br>
                                    <input type="radio" name="group1" value="C">
                                    Greet the student casually, then let him/her know that you would like the process
                                    to move quickly so you can leave.<br>
                                </div>
                            </div>

                            <div class="item">
                                <h1>
                                    Question 2</h1>
                                <p>
                                    <font size="6"> When standing in front of a student, it is best to:</font>
                                </p>

                                <div>
                                    <input type="radio" name="group1" value="A">
                                    Stand somewhat to his/her side<br>
                                    <br>
                                    <input type="radio" name="group1" value="B">
                                    Stand squarely in front of him/her, but at a comfortable distance<br>
                                    <br>
                                    <input type="radio" name="group1" value="C">
                                    Stand squarely in front of the student, but close enough that you're looking down
                                    on him/her<br>
                                    <br>
                                    <input type="radio" name="group1" value="D">
                                    All of the above<br>
                                </div>
                            </div>

                            <div class="item">
                                <h1>
                                    Question 3</h1>
                                <p>
                                    <font size="6"> You have six projects to judge. The first thing you should do is:</font>
                                </p>

                                <div>
                                    <input type="radio" name="group1" value="A">Head to your first project and introduce
                                    yourself. Then, explain that you would like to hear from the student about their
                                    project before reading his/her paper.<br>
                                    <br>
                                    <input type="radio" name="group1" value="A">
                                    Stop by your first project and ask if the participant has any questions.<br>
                                    <br>
                                    <input type="radio" name="group1" value="A">
                                    Visit each project on your list, giving students information about where they are
                                    in your order of projects (first, second, etc.) and when they should expect you.<br>
                                    <br>
                                    <input type="radio" name="group1" value="A">
                                    None of the above
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" data-slide="prev" style="margin-top: -100px; margin-left: 280px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Previous</a>
            <a href="#myCarousel" data-slide="next" style="margin-top: -100px; margin-left: 374px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Next</a>
        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/presentation.js"></script>
        <script type="text/javascript" src="js/dropdown.js"></script>
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

