<?php session_start();
include('loginscript.php');
if(isset($_SESSION['identifier']))
{
    
}
else
    header('Location: login.php');
if($_SESSION['accesslevel'] == "Admin")
{

}
else
{
    header('Location: presentation.php');
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/edittest.css" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
    <link rel="stylesheet" href="css/modal.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-formhelpers.css" type="text/css" />


</head>
<body>
 <div class="modal fade" id="myModal" style="overflow-y:hidden">
            <div class="modal-header">
                <div style = "position: absolute; top: 30px; z-index: 10">
                    Select a slide type <br>
                    <select id="slideTypeChanger">
                        <option value = "Question">Question</option>
                        <option value = "image">Image</option>
                        <option value = "video">Video</option>
                    </select>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">        
                    &times;
                </button>              
            </div>
            <div class="modal-body" id="questionForm" >
                <form id="newQuestionForm" style="position: absolute; top: 60px">     
                        <h5>Question:</h5>
                        <input type="text" id="question" name="question" size="50" />
                        <h5>Correct Answer:</h5>
                        <input type="text" id="correctAnswer" name="correctAnswer" size="50" />
                        <h5>Wrong Answer One:</h5>
                        <input type="text" id="wrongAnswerOne" name="wrongAnswerOne" size="50" />
                        <h5>Wrong Answer Two:</h5>
                        <input type="text" id="wrongAnswerTwo" name="wrongAnswerTwo" size="50" />
                        <h5>Wrong Answer Three:</h5>
                        <input type="text" id="wrongAnswerThree" name="wrongAnswerThree" size="50" />   
                        <input type="hidden" id="questionId" name="questionId" />
                </form> 
            </div>
            <div class="modal-body" id="imageSelect" style="position: absolute; top: 60px; width: 100%; height: 100%; display: table">
            <div style="display: table-cell; text-align: center">
                <form method="post" enctype="multipart/form-data"  id="uploadFileForm">  
                  <input type="file" name="images" id="imagesInput" />                    
                </form>  
                <div id="loadedImage">
                </div>
            </div>
            </div>
            <div class="modal-body" id="videoSelect"  style="position: absolute; top: 60px;">
            Video URL:
            <form id="videoForm">
            <input type = "text" name="videoURL" id="videoURL" />
            </form>
            </div>
            <div class="modal-footer" style="position: absolute; right: 0px; bottom:0px">
                <a id="submitButton" href="#" class="btn btn-primary">
                    Submit
                </a>
                <a id="info-modal-close" href="#" class="btn">
                    Close
                </a>
                </form>
            </div>
        </div>
</div>

<div id="Main" style="border: none">               
                
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
                    <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1);" onmouseout="ddMenu('one',-1)"><a style="text-decoration: none;">Administration</a></dt>
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
                                <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;" href="editpresentation.php">Edit Presentation</a></li>
                                <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;" href="edittest.php">Edit Test</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div id="content" style="border-bottom-right-radius: 0px; border:none;">
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
                        z-index: 100;
                        width: 200px;" id="moduleSelect"
                            >
                        Select Module
                    </center>
                    <div id="moduleList" style="position: absolute; margin-top: 20px;z-index: 1000; width:inherit;color:white;background-color:rgb(150,150,150);border:1px;border-style:solid;border-color:grey">

                    </div>
                    <center id="innerlist">
                        <div class="list-group" id="questionButton">      
                        
                        </div>
                    </center>
                </div>
            </center>
            <div id="currentslide" style="font-size: .8em; display: table;">
                <div id ="question"style="display:table-cell; vertical-align:middle; text-align:center">
                    <div id ="questionCenter">
                    </div>
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
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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

