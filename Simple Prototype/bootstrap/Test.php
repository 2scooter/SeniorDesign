<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>STEM Science Fair Training</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <style>
        /* GLOBAL STYLES
    -------------------------------------------------- */
        /* Padding below the footer and lighter body text */
        
        body
        {
            padding-bottom: 0;
            color: #000000;
            background-image: url('1.jpg');
            background-color: #BDBDBD;
        }
        
        
        #nbar
        {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 850px;
        }
        
        
    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .con    tainer surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 0px;
     /* margin-bottom: 500px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      background-color: aqua;
      background-image: linear-gradient(to bottom, blue, transparent);
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      color: white;

    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a 
    {
        color: white;
        padding: 15px 20px;

    }
     .navbar .nav > li > a:hover
     {
      color: black;  
      text-shadow: none; 
     }
     
     .navbar .nav > .active > a:hover
     {
      color: black;   
     }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }

    .navbar .brand:hover
    {
        color: black;
    }
        .navbar-inverse .nav .active > a, .navbar-inverse .nav .active > a:hover, .navbar-inverse .nav .active > a:focus {
        color: #ffffff;
        background-color: rgba(0, 39, 197, 0.24);
    }
    .navbar-inverse .nav .active > a:hover
    {
        color: black;
    }

        
        
        
        /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */
        
        /* Carousel base class */
        .carousel
        {
            margin-top: 50px;
        }
        
        .carousel .container
        {
            position: relative;
            z-index: 9;
        }
        
        .carousel-control
        {
            height: 80px;
            margin-top: 0;
            font-size: 120px;
            text-shadow: 0 1px 1px rgba(0,0,0,.4);
            background-color: transparent;
            border: 0;
            z-index: 10;
        }
        
        .carousel .item
        {
            height: 500px;
        }
        .carousel img
        {
            position: absolute;
            top: 0px;
            left: 0;
            min-width: 100%;
            height: 500px;
        }
        
        .carousel-caption
        {
            background-color: transparent;
            position: static;
            max-width: 550px;
            padding: 0 20px;
            margin-top: 200px;
        }
        .carousel-caption h1, .carousel-caption .lead
        {
            margin: 0;
            line-height: 1.25;
            color: #fff;
            text-shadow: 0 1px 1px rgba(0,0,0,.4);
        }
        .carousel-caption .btn
        {
            margin-top: 10px;
        }
        
        
        
        /* MARKETING CONTENT
    -------------------------------------------------- */
        
        /* Center align the text within the three columns below the carousel */
        /*   .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


   


    /* RESPONSIVE CSS
    -------------------------------------------------- */
        
        @media (max-width: 979px)
        {
        
            .container.navbar-wrapper
            {
                margin-bottom: 0;
                width: auto;
            }
            .navbar-inner
            {
                border-radius: 0;
                margin: -20px 0;
            }
        
            .carousel .item
            {
                height: 500px;
            }
            .carousel img
            {
                width: auto;
                height: 500px;
            }
        }
        
        
        @media (max-width: 767px)
        {
        
            .navbar-inner
            {
                margin: -20px;
            }
        
            .carousel
            {
                margin-left: -20px;
                margin-right: -20px;
            }
            .carousel .container
            {
            }
            .carousel .item
            {
                height: 300px;
            }
            .carousel img
            {
                height: 300px;
            }
            .carousel-caption
            {
                width: 65%;
                padding: 0 70px;
                margin-top: 100px;
            }
            .carousel-caption h1
            {
                font-size: 30px;
            }
            .carousel-caption .lead, .carousel-caption .btn
            {
                font-size: 18px;
            }
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <style type="text/css" id="holderjs-style">
        .holderjs-fluid
        {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            font-family: sans-serif;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- NAVBAR
    ================================================== -->
    <script language="JAVASCRIPT"></script>
    <div class="navbar-wrapper">
        <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
        <!--<div class="container">-->
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div id="nbar">
                    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar">
                        </span>
                    </button>
                    <a class="brand" href="index.php">Regioinal Science and Engineering Challenge!</a>
                    <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                    <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Presentation.php">Presentation</a></li>
                        <li class="active"><a href="Test.php">Test</a></li>
                        <!-- Read about Bootstrap dropdowns at http://twitter.github.com/bootstrap/javascript.html#dropdowns -->
                        <!--<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                          </ul>
                        </li>-->
                      <li>
                      <?php if($_SESSION['name'] == "") : ?>
                      <a class="janrainEngage" href="#">Login</a></li>
                      <?php else : ?>
                      <a href ="logout.php">Logout</a>
                      <?php endif; ?>
                  </ul>          
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- /.navbar-inner -->
            </div>
            <!-- /.navbar -->
        </div>
    </div>
    <!-- /.container -->
    </div><!-- /.navbar-wrapper -->
    <!-- Carousel
    ================================================== -->
    <div id="page">
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <!--<img src="bootstrap/1.jpg" alt="">-->
                    <div class="container">
                        <object data="questionOne.htm" width="1170 " height="480">
                            <embed src="questionOne.htm" width="1170" height="480"> 
          </embed>
                            Error: Embedded data could not be displayed.
                        </object>
                        <div class="progress progress-striped active" style="margin-top: 0px;">
                            <div class="bar" style="width: 1%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!--<img src="bootstrap/2.jpg" alt="">-->
                    <div class="container">
                        <object data="questionTwo.htm" width="1170 " height="480">
                            <embed src="questionTwo.htm" width="1170" height="480"> 
          </embed>
                            Error: Embedded data could not be displayed.
                        </object>
                        <div class="progress progress-striped active" style="margin-top: 0px;">
                            <div class="bar" style="width: 33%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!--<img src="bootstrap/3.jpg" alt="">-->
                    <div class="container">
                        <object data="questionThree.htm" width="1170 " height="480">
                            <embed src="questionThree.htm" width="1170" height="480"> 
          </embed>
                            Error: Embedded data could not be displayed.
                        </object>
                        <div class="progress progress-striped active" style="margin-top: 0px;">
                            <div class="bar" style="width: 66%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!--<img src="bootstrap/3.jpg" alt="">-->
                    <div class="container">
                        <object data="testEnd.htm" width="1170 " height="480">
                            <embed src="testEnd.htm" width="1170" height="480"> 
          </embed>
                            Error: Embedded data could not be displayed.
                        </object>
                        <div class="progress progress-striped active" style="margin-top: 0px;">
                            <div class="bar" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">�</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">�</a>
-->
    </div>
    <!-- /.carousel -->
    <a href="#myCarousel" data-slide="prev" style="margin-left: 1000px;" class="btn btn-large btn-primary"
        href="#">Previous</a> <a href="#myCarousel" data-slide="next" class="btn btn-large btn-primary"
            href="#">Next</a>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/jquery.js"></script>
    <script src="bootstrap/bootstrap-transition.js"></script>
    <script src="bootstrap/bootstrap-alert.js"></script>
    <script src="bootstrap/bootstrap-modal.js"></script>
    <script src="bootstrap/bootstrap-dropdown.js"></script>
    <script src="bootstrap/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/bootstrap-tab.js"></script>
    <script src="bootstrap/bootstrap-tooltip.js"></script>
    <script src="bootstrap/bootstrap-popover.js"></script>
    <script src="bootstrap/bootstrap-button.js"></script>
    <script src="bootstrap/bootstrap-collapse.js"></script>
    <script src="bootstrap/bootstrap-carousel.js"></script>
    <script src="bootstrap/bootstrap-typeahead.js"></script>
    <script>
        !function ($) {
            $(function () {//twirl the caroslel
                $('#myCarousel').carousel()
            })
        } (window.jQuery)
    </script>
    <script src="bootstrap/holder.js"></script>
        <!--
    MATT'S LOGIN STUFF!
    -->
    <script type="text/javascript">
    (function() {
        if (typeof window.janrain !== 'object') window.janrain = {};
        if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};
        
        janrain.settings.tokenUrl = 'http://www.judgestraining.org/index.php';

        function isReady() { janrain.ready = true; };
        if (document.addEventListener) {
          document.addEventListener("DOMContentLoaded", isReady, false);
        } else {
          window.attachEvent('onload', isReady);
        }

        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.id = 'janrainAuthWidget';
        if (document.location.protocol === 'https:') {
          e.src = 'https://rpxnow.com/js/lib/stem-login/engage.js?minify=false&3719813926';
        } else {
          e.src = 'http://rpxnow.com/js/lib/stem-login/engage.js?minify=false&3719813926';
        }
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(e, s);
    })();
    </script>
  
</body>
</html>