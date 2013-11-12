<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/dataTables.css">
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
                            <tab><a style="color:tomato; text-decoration: none;" href="contact.php">Contact Us</a></tab>
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
                <div id="content">
                    <div id="tabscontent">
                        <br>
                        <br>
                        <h4 style="color:black; margin-left:2em;">The Resource Center is in Science 0212A</h4>
                        <br>
                        <h4 style="color:black; margin-left:2em;">Phone: &emsp;618-650-3065</h4>
                        <br>
                        <h4 style="color:black; margin-left:2em;">E-mail: &emsp;STEMCenter@siue.edu</h4>
                        <br>
                        <h4 style="color:black; margin-left:2em;">Mailing Address: <br>&emsp;&emsp;STEM Center,
                        <br>&emsp;&emsp;Science Building 0212A, <br>&emsp;&emsp;Edwardsville, IL 62026-2224</h4>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/Con.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/paging.js"></script>
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

