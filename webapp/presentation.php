<?php session_start();
include('loginscript.php');

if(isset($_SESSION['identifier']))
{
  $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  $myQuery = 'SELECT * FROM users WHERE accountID = "' . $_SESSION['identifier'] .'"';
  $currentUser = mysqli_query($con,$myQuery);
  $currentUser = mysqli_fetch_array($currentUser);
  $_SESSION['accesslevel'] = $currentUser['accesslevel'];
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
                        <tab><a style="color:tomato; text-decoration: none;" href="presentation.php">Presentation</a></tab>
                    </li>
                    <?php
                        if(($_SESSION['accesslevel'] != "Judge")||($_SESSION['finishPresentation'] == "1"))
                            echo '
                           <li id="tabHeader_2" tab = "1">
                                <tab><a style="text-decoration: none;" href="test.php">Test</a></tab>
                            </li>';
                    ?>
                    <?php
                        if(($_SESSION['accesslevel'] == "Admin")||($_SESSION['accesslevel'] == "View-Only"))
                            echo '
                            <li tab = "0" onmouseover="ddMenu(\'one\',1);" onmouseout="ddMenu(\'one\',-1)">
                                <dt id="one-ddheader" onclick="displayPage(2)"><a style="text-decoration: none;">Administration</a></dt>
                            </li>';
                    ?>
                    <li id="tabHeader_3" tab = "1">
                        <tab><a style="text-decoration: none;" href="account.php">Account</a></tab>
                    </li>
                    <li id="tabHeader_4" tab = "1">
                        <tab><a style="text-decoration: none;" href="contact.php">Contact Us</a></tab>
                    </li>
                    <li id="tabHeader_5" tab = "1">
                        <tab><a style="text-decoration: none;" href="logout.php">Logout</a></tab>
                    </li>
                </ul>
                <div id="dropdown">
                    <div id="one-ddcontainer">
                        <dl class="dropdown">
                            <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                                <div id="whiteLine" style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                                <ul>
                                    <li id="tabHeader_7" tab = "1"><a style="text-decoration: none;" href="judges.php">View Judges</a></li>
                                    <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                    <?php if($_SESSION['accesslevel'] == "Admin")
                                    echo'
                                    <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;" href="editpresentation.php">Edit Presentation</a></li>
                                    <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;" href="edittest.php">Edit Test</a></li>
                                    '?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

           <div id="content" style="height:458px;">
                <div id="content_inner" style="
                ">
                  <div id="slidelist" style="
                    width: 200px;
                    position: absolute;
                    height: 454px;
                    margin-left: -25px;
                    margin-top: -25px;
                    background-color: white;
                    border-top-left-radius: 25px;  border-bottom-left-radius: 25px;
                ">
                                    <center style="
                                        border-width: 2px;
                                        border-style: solid;
                                        border-top-left-radius: 25px;
                                        background-color: gray;
                                        color: white;
                                        position: absolute;
                                        z-index: 1;
                                        width: 100%;
                ">
                                        Modules
                                    </center>

                                    <center id="innerlist" style="
                    margin-top: 25px;
                    background-color: white;
                    height:429px;
                    border-bottom-left-radius:25px;
                    overflow-y:auto;
                ">
                                        <div class="list-group" id="questionButton">
                                        
                                        </div>
                                    </center>
                                </div>
                                
                 <div id="myCarousel" class="carousel slide" height="inherit" data-interval="false" style="margin-left: 200px;">
                                        <div class="carousel-inner" id="carousel-inner" height="inherit">
                 </div>
                 </div>
                 </div>
            </div>
            <a href="#myCarousel" style="margin-top: -100px; margin-left: 280px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#" id="previousButton">Previous</a>
            <a href="#myCarousel" style="margin-top: -100px; margin-left: 374px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#" id="nextButton">Next</a>
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

