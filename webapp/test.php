<?php session_start();
if(isset($_SESSION['identifier']))
{
    $_SESSION['finishPresentation'] = 1;
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

        <div id="Main" style="height: 85%;">
            <div id="tabs">
                <ul id="tabslist">
                    <li id="tabHeader_1" tab = "1">
                        <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
                    </li>
                    <li id="tabHeader_2" tab = "1">
                        <tab><a style="color:tomato; text-decoration: none;" href="test.php">Test</a></tab>
                    </li>
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
                                    <?php 
                                    if($_SESSION['accesslevel'] == "Admin")
                                    echo'
                                    <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;" href="editpresentation.php">Edit Presentation</a></li>
                                    <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;" href="edittest.php">Edit Test</a></li>
                                    '
                                    ?>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div id="content" style="height: 90%;">
                <div id="content_inner">
                    <div id="myCarousel" class="carousel slide" height="inherit" data-interval="false">
                        <div class="carousel-inner" height="inherit">
                      <?php                        
                         $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
                          // Check connection
                          if (mysqli_connect_errno($con))
                          {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                          }     
                          $count = 1;
                          $result = mysqli_query($con,"SELECT * FROM testquestions ORDER BY rand()"); 
                          while($ROW = mysqli_fetch_array($result))
                          {        
                            $answers = array($ROW['answerOne'],$ROW['answerTwo'],$ROW['answerThree'],$ROW['answerFour']);
                            if($count == 1)
                                echo'<div class="item active" height="inherit" id="1">';
                            else
                                echo'<div class ="item" id="'.$count.'">';
                            echo'  
                            <form class="wrap">
                                <h1>Question ' . $count. '</h1>
                                <p>
                                    <font size="6"> '. $ROW['question'] . '</font>
                                </p>

                                <div>                                                            
                                    <input type="radio" name="group' . $count . '" value="A">                                   
                                    ' . $answers[0] . '<br><br>
                                    <input type="radio" name="group' . $count . '" value="B">
                                    ' . $answers[1]. '<br><br>
                                    <input type="radio" name="group' . $count . '"value="C">
                                    ' . $answers[2] . '<br><br>';
                            if($ROW['answerFour'] != '')
                                    echo'
                                    <input type="radio" name="group' . $count . '"value="D">
                                    ' . $answers[3] . '<br>';
                                echo'
                                <input type="hidden" class="correctAnswer" value="'.$ROW['correctAnswer'].'">
                                </div>
                                </form>
                            </div>';
                            
                            $count++;
                          }        
                          echo'
                          <div class="item" style="font-size: 25px; width:650px; margin-left:auto;margin-right:auto">
                          You have completed the test! To submit your answers and get your score, hit submit! If you would like to change any answers, you may navigate to previous questions using the previous and next buttons.
                          <br><br><center><a id="submitButton" href="#" class="btn btn-large btn-primary">Submit</a>
                          <br><br>
                          <h1 id="score"></h1>
                          </center>
                          <div id="testSubmitResult">
                          </div>
                          </div>
                        
                          ';
                          
                        ?>              
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" id="previousButton"  style="margin-top: -100px; margin-left: 280px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Previous</a>
            <a href="#myCarousel" id="nextButton"  style="margin-top: -100px; margin-left: 374px; left:50%; position:absolute;" class="btn btn-large btn-primary" href="#">Next</a>
        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/test.js"></script>
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

