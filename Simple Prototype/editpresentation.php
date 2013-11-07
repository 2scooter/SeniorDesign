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
    <link rel="stylesheet" href="css/modal.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-formhelpers.css" type="text/css" />
    <link rel="stylesheet" href="css/edittest.css" type="text/css" />

</head>
<body>
<div class="modal fade" id="myModal">
</div>
<div id = "saveResponse">
Save Response goes here
</div>

<!--<img id="logo" src="images/logo.png"/>-->
<!--<div id="heads">-->
<!--<div id="headerText">-->
<!--Regional Science and Engineering Challenge-->
<!--</div>-->
<!--<div id="whiteline" style="height:2px; background-color: white; width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>-->
<!--</div>-->
<!--<div id="tabspace"></div>-->

<div id="Main">               
                
    <img id="logo" src="images/logo.png"/>
    <div id="heads">
        <div id="headerText">
            Regional Science and Engineering Challenge
        </div>
        <div id="whiteline" style="height:2px; background-color: white;width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>
    </div>
    <div id="tabspace"></div>

    <div id="tabContainer">
        <div style="margin-top:-45px;" id="tabs">
            <ul id="tabslist">
                <li id="tabHeader_1" tab = "1">
                    <tab><a style="text-decoration: none;" href="index.php">Home</a></tab>
                </li>
                <li id="tabHeader_2" tab = "1">
                    <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
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
                            <div style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                            <ul style="margin-left:-425px;">
                                <li id="tabHeader_7" tab = "1"><a style="text-decoration: none;" href="judges.php">View Judges</a></li>
                                <li id="tabHeader_8" tab = "1"><a style="color:tomato; text-decoration: none;" href="users.php">Edit Users</a></li>
                                <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;">Edit Presentation</a></li>
                                <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;">Edit Test</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div id="content" style="border-bottom-right-radius: 0px;">
        <div id="content_inner">
            <center>
                <div id="slidelist">
                    <center style="
                        border-width: 2px;
                        border-style: solid;
                        border-top-left-radius: 25px;
                        background-color: gray;
                        color: white;
                        position: absolute;
                        z-index: 200;
                        width: 179px;"
                            >
                        Question List
                    </center>

                    <center id="innerlist">
                        <div class="list-group" id="questionButton">
                        <?php
                             $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
                             if (mysqli_connect_errno($con))
                             {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                             }
                             $result = mysqli_query($con,"SELECT * FROM testquestions");
                             $count = 0;
                             while($row = mysqli_fetch_array($result))
                             {
                              if($count == 0)
                              {
                                  echo '<a href="#" class="list-group-item active" id = "'. $row['questionId']. '">';
                                  echo 'Question '. $row[questionId];
                                  echo '</a> ';
                              }
                              else
                              {                                  
                                  echo '<a href="#" class="list-group-item" id = "'. $row['questionId']. '">';
                                  echo 'Question '. $row[questionId];
                                  echo '</a> ';
                              }
                                                 
                              $count++;
                             }
                          ?>
                        
                        </div>
                    </center>
                </div>
            </center>
            <div id="currentslide" style="font-size: .8em;">
                <center style="margin-top:25px;">
                    <img style="width:90%;" src="images/m1/Slide1.PNG"/>
                </center>
            </div>
            <div id="controls">


                <!--Question input Start-->
                <div id="question_input">
                    <!--<form method="POST" enctype="multipart/form-data" action="fup.cgi">-->
                        <!--File to upload: <input type="file" name="upfile"><br>-->
                        <!--Notes about the file: <input type="text" name="note"><br>-->
                        <!--<br>-->
                        <!--<input type="submit" value="Press"> to upload the file!-->
                    <!--</form>-->
                    <form action="upload_file.php" method="post"
                          enctype="multipart/form-data">
                        <label for="file">Filename:</label>
                        <input type="file" name="file" id="file"><br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <!--select place start-->
                <div id="select_place" style="margin-top:-95px;">
                    <p style="margin-top: 0px;">Select Place</p>
                    <center>
                        <div class="bfh-selectbox">
                            <input type="hidden" name="selectbox1" value="">
                            <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                <span class="bfh-selectbox-option input-medium" data-option="">#</span>
                                <b class="caret"></b>
                            </a>
                            <div class="bfh-selectbox-options">
                                <div role="listbox">
                                    <ul role="option">
                                        <li><a tabindex="-1" href="#" data-option="1">1</a></li>
                                        <li><a tabindex="-1" href="#" data-option="2">2</a></li>
                                        <li><a tabindex="-1" href="#" data-option="3">3</a></li>
                                        <li><a tabindex="-1" href="#" data-option="4">4</a></li>
                                        <li><a tabindex="-1" href="#" data-option="5">5</a></li>
                                        <li><a tabindex="-1" href="#" data-option="6">6</a></li>
                                        <li><a tabindex="-1" href="#" data-option="7">7</a></li>
                                        <li><a tabindex="-1" href="#" data-option="8">8</a></li>
                                        <li><a tabindex="-1" href="#" data-option="9">9</a></li>
                                        <li><a tabindex="-1" href="#" data-option="10">10</a></li>
                                        <li><a tabindex="-1" href="#" data-option="11">11</a></li>
                                        <li><a tabindex="-1" href="#" data-option="12">12</a></li>
                                        <li><a tabindex="-1" href="#" data-option="13">13</a></li>
                                        <li><a tabindex="-1" href="#" data-option="14">14</a></li>
                                        <li><a tabindex="-1" href="#" data-option="15">15</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p>Select Type</p>
                        <div class="bfh-selectbox">
                            <input type="hidden" name="selectbox1" value="">
                            <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                <span class="bfh-selectbox-option input-medium" data-option="">Type</span>
                                <b class="caret"></b>
                            </a>
                            <div class="bfh-selectbox-options">
                                <div role="listbox">
                                    <ul role="option">
                                        <li><a tabindex="-1" href="#" data-option="1">Image</a></li>
                                        <li><a tabindex="-1" href="#" data-option="2">Video</a></li>
                                        <li><a tabindex="-1" href="#" data-option="3">Question</a></li>
                                </div>
                            </div>
                        </div>

                </center>
                </div>

                <div id="applybox"style="margin-top:-95px;">
                    <center>
                        <button type="button" class="btn btn-default" style="margin-top:50px;">Apply</button>
                    </center>
                </div>   
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/dropdown.js"></script>
<script src="js/editpresentation.js"></script>
<script src="js/presentation.js"></script>
<script src="js/bootstrap-formhelpers-selectbox.js"></script>
<script src="js/fileinput.js"></script>
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

