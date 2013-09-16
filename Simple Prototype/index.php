<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/dropdown.css" type="text/css" />
	<script type="text/javascript" src="js/dropdown.js"></script>
	<script type="text/javascript" src="js/electricslide.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="heads">
            <div id="headerTitle">
                STEM
            </div>
            <div id="headerText">
                Regional Science and Engineering Challenge
            </div>
            <div id="headerSubText">
                Training and Testing
            </div>
            <div id="whiteline" style="height:2px; background-color: white; left:50%; width:950px; margin-left:-475px; top:100px; position: absolute;">
        </div>
    </div>
    <div id="tabspace"></div>

    <div id="tabContainer">
        <div id="tabs">
            <ul id="tabslist">
                <li id="tabHeader_1" tab = "1">
                    <tab><a style="color:tomato; text-decoration: none;" href="index.php">Home</a></tab>
                </li>
                <li id="tabHeader_2" tab = "1">
                    <tab><a style="color:white; text-decoration: none;" href="presentation.php">Presentation</a></tab>
                </li>
                <li id="tabHeader_3" tab = "1">
                    <tab><a style="color:white; text-decoration: none;" href="test.php">Test</a></tab>
                </li>
                <li tab = "0">
                     <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1); setLeft()" onmouseout="ddMenu('one',-1)"><a>Administration</a></dt>
                </li>
                <li>
                    <tab><a style="color:white; text-decoration: none;" href="contact.php">Contact Us</a></tab>
                </li>
            </ul>
            <div id="dropdown">
                <div id="one-ddcontainer">
                    <dl class="dropdown">
                        <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                            <div id="whiteLine" style="width:950px; height:2px; background-color:white; margin-top:20px; left:50%; margin-left:-475px; position:absolute;"></div>
                            <ul style="margin-left:-425px;">
                              <li id="tabHeader_7" tab = "1"><a>View Judges</a></li>
                              <li id="tabHeader_8" tab = "1"><a>Edit Users</a></li>
                                <li id="tabHeader_9" tab = "1"><a>Edit Presentation</a></li>
                                <li id="tabHeader_10" tab = "1"><a>Edit Test</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <div id="content">
            <div id="tabscontent">
                <div class="tabpage" id="tabpage_1">
                    <!-- php to build the slider list -->
                    <div class="sliderContainer">
                        <ul>
                        <?php
                            if ($handle = opendir('data1/slides')) {
                                $count = 0;
                                while(false !== ($file = readdir($handle)))
                                {
                                    if ($file != "." && $file != ".."/*You can add more exceptions here if you want*/){
                                        $file = "data1/slides/" . $file;
                                        $data = fopen($file, 'r');
                                        $text = fread($data , filesize($file));
                                        fclose($data);
                                        echo $text;
                                    }
                                    $count = $count + 1;
                                }
                                closedir($handle);
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div id="midline" style = "height:100%; width:1px; background-color:pink; position:absolute; left:50%;"></div>-->
    <img id="logo" src="images/logo.png"/>
    <div id="testfont">
         
    </div>

    <script src="js/index.js"></script>

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

