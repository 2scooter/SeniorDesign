<?php session_start(); ?>
<!--
Matt's PHP stuff - START
-->
<?php
/*
 * This script is intended as an educational tool.
 * Please look at the PHP SDK if you are looking for somthing suited to a new project.
 * https://github.com/janrain/Janrain-Sample-Code/tree/master/php/janrain-engage-php-sdk
 */

ob_start();
/*
 Below is a very simple and verbose PHP 5 script that implements the Engage token URL processing and some popular Pro/Enterprise examples.
 The code below assumes you have the CURL HTTP fetching library with SSL.  
*/

// PATH_TO_API_KEY_FILE should contain a path to a plain text file containing only
// your API key. This file should exist in a path that can be read by your web server,
// but not publicly accessible to the Internet.
$rpx_api_key = "6f7db617b7e06dd9497f089bee3d72648e03bbcd";

/*
 Set this to true if your application is Pro or Enterprise.
 Set this to false if your application is Basic or Plus.
*/
$engage_pro = false;

/* STEP 1: Extract token POST parameter */
$token = $_POST['token'];

//Some output to help debugging
/*
echo "SERVER VARIABLES:\n";
var_dump($_SERVER);
echo "HTTP POST ARRAY:\n";
var_dump($_POST);
*/

if(strlen($token) == 40) {//test the length of the token; it should be 40 characters

  /* STEP 2: Use the token to make the auth_info API call */
  $post_data = array('token'  => $token,
                     'apiKey' => $rpx_api_key,
                     'format' => 'json',
                     'extended' => 'false'); //Extended is not available to Basic.

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, 'https://rpxnow.com/api/v2/auth_info');
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_FAILONERROR, true);
  $result = curl_exec($curl);
  if ($result == false){
    echo "\n".'Curl error: ' . curl_error($curl);
    echo "\n".'HTTP code: ' . curl_errno($curl);
    echo "\n"; var_dump($post_data);
  }
  curl_close($curl);


  /* STEP 3: Parse the JSON auth_info response */
  $auth_info = json_decode($result, true);

  if ($auth_info['stat'] == 'ok') {
    echo "Authenticated!";
  /*
    echo "\n auth_info:";
    echo "\n"; var_dump($auth_info);
  */
    $profile = $auth_info[profile];
    $email = $profile[email];
    $identifier = $profile[identifier];
    $identifier = trim($identifier,"https://www.google.com/profiles/");
    $_SESSION['name'] = $identifier;
    $displayname = $profile[displayname];

    // DATABASE STUFF GOES HERE ===============================
// Create connection
$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
    
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
  {
      echo "Connection successful!";
  }
  mysqli_query($con,"INSERT INTO users (accountid) VALUES ('p00p')");
  

 mysqli_close($con);

    // END DATABASE STUFF =====================================
    

    } else {
      // Gracefully handle auth_info error.  Hook this into your native error handling system.
      echo "\n".'An error occured: ' . $auth_info['err']['msg']."\n";
      var_dump($auth_info);
      echo "\n";
      var_dump($result);
    }
}else{
  // Gracefully handle the missing or malformed token.  Hook this into your native error handling system.
  echo 'Authentication canceled.';
}
$debug_out = ob_get_contents();
ob_end_clean();
?>

<!--
----------------------------Matt's PHP stuff - END
-->

<!DOCTYPE html>
<html lang="en"><head>
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

    body {
      padding-bottom: 0;
      color: #E5E886;
      background-image:url('1.jpg');
         background-color:#BDBDBD;
    }

    #nbar {
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


    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
     
      margin-top: 50px;
      
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }
    

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      display:block;
      margin-left:auto;
      margin-right:auto;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
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

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

     



    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.png">
  <style type="text/css" id="holderjs-style">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style></head>

  <body>



    <!-- NAVBAR   ================================================== -->
    <div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <!--<div class="container">-->

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <div id="nbar">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="home.htm">Regioinal Science and Engineering Challenge!</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
           <ul class="nav">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="Presentation.php">Presentation</a></li>
                <li><a href="Test.php">Test</a></li>
                <li>
              <?php if($_SESSION['name'] == "") : ?>
              <a class="janrainEngage" href="#">Login</a></li>
              <?php else : ?>
              <a href ="logout.php">Logout</a></li>
              <?php endif; ?>
              </ul>          
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      <div class="carousel-inner">
        <div class="item active">              
       
        <?php 
        if($_SESSION['name'] != "")
        {
         echo "<center>";
         echo "<h1>";
         echo "<font color = white>";
         echo "Welcome to the site, ". $_SESSION['name'] . "<br>";
         echo "</font>";
         echo "</h1>";
         echo "</center>";
        } ?>

          <img src="Pictures/Fair Overview.jpg" alt="">
          <div class="container">
         <!-- <object data=simpleSub.htm width="1170 " height="480"> 
                <embed src=simpleSub.htm width="1170" height="480"> 
          </embed> Error: Embedded data could not be displayed. </object>-->
          </div>
        </div>
        <div class="item">
          <img src="Pictures/Fair 1.jpg" alt="">
          <div class="container">
          </div>
        </div>
        <div class="item">  
          <img src="Pictures/Fair 2.jpg" alt="">
          <div class="container">
          <object data=subpage.htm width="1170 " height="480"> 
                <embed src=subpage.htm width="1170" height="480"> 
          </embed> Error: Embedded data could not be displayed. </object>
          </div>
        </div>
        <div class="item">
          <img src="Pictures/Jonathan Naber explaining his project.jpg" alt="">
          <div class="container">
          </div>
        </div>
        <div class="item">
          <img src="Pictures/Fair 3.jpg" alt="">
          <div class="container">
          </div>
        </div>
        <div class="item">
          <img src="Pictures/Science Fair 2011.jpg" alt="">
          <div class="container">
          </div>
        </div>
      </div>
    </div><!-- /.carousel -->

    



     <!-- <div class="featurette">
        <img class="featurette-image pull-right" src="bootstrap/browser-icon-chrome.png">
        <h2 class="featurette-heading">First featurette headling. <span class="muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor 
fringilla. Vestibulum id ligula porta felis euismod semper. Praesent 
commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, 
tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-left" src="bootstrap/browser-icon-firefox.png">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor 
fringilla. Vestibulum id ligula porta felis euismod semper. Praesent 
commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, 
tellus ac cursus commodo.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" src="bootstrap/browser-icon-safari.png">
        <h2 class="featurette-heading">And lastly, this one. <span class="muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor 
fringilla. Vestibulum id ligula porta felis euismod semper. Praesent 
commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, 
tellus ac cursus commodo.</p>
      </div>-->





    <!-- The Javascript
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
    <script src="bootstrap/mainCarosel.js"></script>
    <script src="bootstrap/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="bootstrap/holder.js"></script>
    <!--
    MATT'S LOGIN STUFF!
    -->
    <script type="text/javascript">
    (function() {
        if (typeof window.janrain !== 'object') window.janrain = {};
        if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};
        
        janrain.settings.tokenUrl = 'http://www.judgestraining.org/home.php';

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
  

</body></html>
