<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="index.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="dropdown.css" type="text/css" />
	<script type="text/javascript" src="dropdown.js"></script>
	<script type="text/javascript" src="electricslide.js"></script>

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
			<div id="tabspace">
			</div>    
			<div id="tabContainer">
                <div id="tabs">
                    <ul>
						<li id="tabHeader_1" tab = "1">
							<tab><h1><a>Home</a></h1></tab>
						</li>
						<li id="tabHeader_2" tab = "1">
						 
							<tab><h1><a>Presentation</a></h1></tab>
						</li>
						<li id="tabHeader_3" tab = "1">
							<tab><h1><a>Test</a></h1></tab>
							
						</li>
                        <li tab = "0">
							 <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1); setLeft()" onmouseout="ddMenu('one',-1)"><h1><a>Administration</a></h1></dt>
						</li>
                        <li id="tabHeader_5" tab = "1"><tab><h1>Contact Us</h1></tab></li>
						
					</ul>
					<div id="dropdown">
						<div id="one-ddcontainer">
							<dl class="dropdown">
								<dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
									<div id="whiteLine" style="width:950px; height:2px; background-color:white; margin-top:20px; left:50%; margin-left:-475px; position:absolute;"></div>
									<ul style="margin-left:-230px;">
									  <li id="tabHeader_7" tab = "1"><a>1</a></li>
									  <li id="tabHeader_8" tab = "1"><a>2</a></li>
									  <li id="tabHeader_9" tab = "1"><a>3</a></li>
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
						<div class="tabpage" id="tabpage_2" style="display: block;">
							"																		p2"
						</div>
						<div class="tabpage" id="tabpage_3" style="display: none; margin-top:25px;">
							"																		p3"
						</div>
						<div class="tabpage" id="tabpage_4">
							"																		p4"
						</div>
						<div class="tabpage" id="tabpage_5">
							"                                                                       p5"
						</div>
						<div class="tabpage" id="tabpage_6">
							"                                                                       p6"
						</div>
						<div class="tabpage" id="tabpage_7">
							"                                                                       p7"
						</div>
						<div class="tabpage" id="tabpage_8">
							"                                                                       p8"
						</div>
						<div class="tabpage" id="tabpage_9">
							"                                                                       p9"
						</div>
						<div class="tabpage" id="tabpage_10">
							"                                                                       p10"
						</div>
						<div class="tabpage" id="tabpage_11">
							"                                                                       p11"
						</div>
						<div class="tabpage" id="tabpage_12">
							"                                                                       p12"
						</div>
					</div>
				</div>
			</div>
		<!--<div id="midline" style = "height:100%; width:1px; background-color:pink; position:absolute; left:50%;"></div>-->
		<img id="logo" src="images/logo.png"/>
		<div id="testfont">
			<h1> </h1>
		</div>
		</div>

		<script src="tabs_old.js"></script>
		
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

