<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/common.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
    </head>
    <body>
        <div id="wrapper" style="font-family:sans-serif">
            <img id="logo" src="images/logo.png"/>
            <div id="heads">
                <div id ="STEM" style="text-align:center; font-size:0.70cm;color:white">
                STEM
                </div>
                <div id="whiteline" style="height:2px; background-color: white; width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>
                <div id="headerText">
                    Regional Science and Engineering Challenge
                </div>

            </div>
            <div id="tabspace"></div>


            <div id="content">
                <div id="content_inner">
                <font size ="5">
                Welcome to the judge training site for the Regional Science and Engineering Challenge hosted by SIUE's STEM Center!<br><br>
                This site will guide volunteers through the training process and will certify them to judge the competition!<br><br>
                The expected training session will take approximately 25 minutes.<br><br>
                Please use your google account to sign in.<br><br>
                </font>
                <center>
                   <a href="#" class="janrainEngage"><button class="skip">Sign in.</button></a>
                </center>
                </div>
            </div>
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
      e.src = 'https://rpxnow.com/js/lib/stem-login/engage.js';
    } else {
      e.src = 'http://widget-cdn.rpxnow.com/js/lib/stem-login/engage.js';
    }

    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(e, s);
})();
</script>