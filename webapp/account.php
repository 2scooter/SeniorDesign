<?php session_start(); 


if(isset($_SESSION['identifier']))
{
    
}
else
    header('Location: login.php');
    
    
if(!empty($_POST['firstName']))
{
$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");  
$myQuery = 'UPDATE users 
SET first_name = "' . $_POST['firstName'] . '"
,last_name = "' . $_POST['lastName'] . '"
,address = "' . $_POST['address'] . '"
,phone = " ' . $_POST['phoneArea'] . $_POST['phoneFirst'] . $_POST['phoneLast'] . '"
,city = "' . $_POST['city'] . '"
,state = "' . $_POST['state'] . '"
WHERE accountId = "'. $_SESSION['identifier'] .'"';
mysqli_query($con,$myQuery);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-formhelpers.css">
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
                <div id="whiteline" style="height:2px; background-color:white; width:700px; margin-left:auto; margin-right:auto; top:40px;"></div>
            </div>
            <div id="tabspace"></div>

            <div id="tabContainer">
               <div id="tabs">
                    <ul id="tabslist">
                        <li id="tabHeader_1" tab = "1">
                            <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
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
                        <li tab = "0">
                            <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu(\'one\',1); setLeft()" onmouseout="ddMenu(\'one\',-1)"><a style="text-decoration: none;">Administration</a></dt>
                        </li>';
                        
                        ?>
                        <li id="tabHeader_3" tab = "1">
                            <tab><a style="color:tomato; text-decoration: none;" href="account.php">Account</a></tab>
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
                                    <div style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                                    <ul>
                                        <li id="tabHeader_7" tab = "1"><a style="text-decoration: none;" href="judges.php">View Judges</a></li>
                                        <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                        <?php 
                                        if($_SESSION['accesslevel'] == "Admin")
                                        echo'
                                        <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;" href="editpresentation.php">Edit Presentation</a></li>
                                        <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;" href="edittest.php">Edit Test</a></li>
                                        '; 
                                        ?>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div id="content">
                <?php 
                $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");  
                $myQuery = 'SELECT * FROM users WHERE accountId = "' .$_SESSION['identifier'] . '"';
                $currentUser = mysqli_query($con,$myQuery);
                $currentUser = mysqli_fetch_array($currentUser);
                echo'
                <form action="account.php" method="post" id="myForm">
                    <div class="container" style="margin-top:30px; width:60%;">
                    First Name:
                    <input type="text" name="firstName" id="First Name" style="margin-left:55px; width:250px;" value="' .$currentUser['first_name'] .'"> <br> <br> <br>
                    
                    Last Name:
                    <input type="text" name="lastName" id="Last Name" style="margin-left:55px; width:250px;" value="' .$currentUser['last_name'] .'">  <br> <br> <br>
    
                    Email: 
                    <input type="text" name="emailAddress" id="Email" style="margin-left:87px; width:250px;" value="' .$currentUser['email'] .'" disabled> <br> <br> <br>
                    
                    Phone Number: <b style="margin-left:2em;">(</b>
                    <input type="text" name="phoneArea" id="Phone Area" maxlength="3" size="3" value="' . substr($currentUser['phone'],0,3) .'">
                    <b>)</b>
                    <input type="text" name="phoneFirst" id="Phone" maxlength="3" size="3" value="' . substr($currentUser['phone'],3,3) .'">
                    <b>-</b>
                    <input type="text" name="phoneLast" id="Phone" maxlength="4" size="4" value="' . substr($currentUser['phone'],6,4) .'"><br> <br> <br>
    
                    Home Address:
                <input type="text" id="Address" name="address" style="margin-left:30px; width:250px;"value="' . $currentUser['address'] .'"> <br> <br> 
                City:
                <input type="text" id="City" name="city" style="margin-left:97px; width:250px;"value="' . $currentUser['city'] .'"> <br> <br>
                State:
                <div class="bfh-selectbox" style="margin-left:88px;">
                    <input type="hidden" id="State" name="state" value="' . $currentUser['state'] .'">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option bfh-selectbox-medium" >' . $currentUser['state'] .'</span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <div role="listbox">
                            <ul role="option" id="idSelectbox" style="width:auto; height: 100px;">
                            <li><a tabindex="-1" href="#" data-option="AL">AL</a></li>
                            <li><a tabindex="-1" href="#" data-option="AK">AK</a></li>
                            <li><a tabindex="-1" href="#" data-option="AZ">AZ</a></li>
                            <li><a tabindex="-1" href="#" data-option="AR">AR</a></li>
                            <li><a tabindex="-1" href="#" data-option="CA">CA</a></li>
                            <li><a tabindex="-1" href="#" data-option="CO">CO</a></li>
                            <li><a tabindex="-1" href="#" data-option="CT">CT</a></li>
                            <li><a tabindex="-1" href="#" data-option="DE">DE</a></li>
                            <li><a tabindex="-1" href="#" data-option="FL">FL</a></li>
                            <li><a tabindex="-1" href="#" data-option="GA">GA</a></li>
                            <li><a tabindex="-1" href="#" data-option="HI">HI</a></li>
                            <li><a tabindex="-1" href="#" data-option="ID">ID</a></li>
                            <li><a tabindex="-1" href="#" data-option="IL">IL</a></li>
                            <li><a tabindex="-1" href="#" data-option="IN">IN</a></li>
                            <li><a tabindex="-1" href="#" data-option="IA">IA</a></li>
                            <li><a tabindex="-1" href="#" data-option="KS">KS</a></li>
                            <li><a tabindex="-1" href="#" data-option="KY">KY</a></li>
                            <li><a tabindex="-1" href="#" data-option="LA">LA</a></li>
                            <li><a tabindex="-1" href="#" data-option="ME">ME</a></li>
                            <li><a tabindex="-1" href="#" data-option="MD">MD</a></li>
                            <li><a tabindex="-1" href="#" data-option="MA">MA</a></li>
                            <li><a tabindex="-1" href="#" data-option="MI">MI</a></li>
                            <li><a tabindex="-1" href="#" data-option="MN">MN</a></li>
                            <li><a tabindex="-1" href="#" data-option="MS">MS</a></li>
                            <li><a tabindex="-1" href="#" data-option="MO">MO</a></li>
                            <li><a tabindex="-1" href="#" data-option="MT">MT</a></li>
                            <li><a tabindex="-1" href="#" data-option="NE">NE</a></li>
                            <li><a tabindex="-1" href="#" data-option="NV">NV</a></li>
                            <li><a tabindex="-1" href="#" data-option="NH">NH</a></li>
                            <li><a tabindex="-1" href="#" data-option="NJ">NJ</a></li>
                            <li><a tabindex="-1" href="#" data-option="NM">NM</a></li>
                            <li><a tabindex="-1" href="#" data-option="NY">NY</a></li>
                            <li><a tabindex="-1" href="#" data-option="NC">NC</a></li>
                            <li><a tabindex="-1" href="#" data-option="ND">ND</a></li>
                            <li><a tabindex="-1" href="#" data-option="OH">OH</a></li>
                            <li><a tabindex="-1" href="#" data-option="OK">OK</a></li>
                            <li><a tabindex="-1" href="#" data-option="OR">OR</a></li>
                            <li><a tabindex="-1" href="#" data-option="PA">PA</a></li>
                            <li><a tabindex="-1" href="#" data-option="RI">RI</a></li>
                            <li><a tabindex="-1" href="#" data-option="SC">SC</a></li>
                            <li><a tabindex="-1" href="#" data-option="SD">SD</a></li>
                            <li><a tabindex="-1" href="#" data-option="TN">TN</a></li>
                            <li><a tabindex="-1" href="#" data-option="TX">TX</a></li>
                            <li><a tabindex="-1" href="#" data-option="UT">UT</a></li>
                            <li><a tabindex="-1" href="#" data-option="VT">VT</a></li>
                            <li><a tabindex="-1" href="#" data-option="VA">VA</a></li>
                            <li><a tabindex="-1" href="#" data-option="WA">WA</a></li>
                            <li><a tabindex="-1" href="#" data-option="WV">WV</a></li>
                            <li><a tabindex="-1" href="#" data-option="WI">WI</a></li>
                            <li><a tabindex="-1" href="#" data-option="WY">WY</a></li>
                            </ul>
                        </div>
                    </div>
               </div>
                    </div> 
                </form>
                <br> <br>
                <center>
                    <a id="saveButton" href="#" class="btn btn-primary">Save</a>
                </center>  
               '
               ?>
                


            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/account.js"></script>
        <script type="text/javascript" src="js/dropdown.js"></script>
                <script src="js/bootstrap-formhelpers-selectbox.js"></script>
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

