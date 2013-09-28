<?php session_start();
include ('loginscript.php');
?>
<head>
<link rel="stylesheet" href="css/common.css" type="text/css" />
</head>



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
<div id ="blue bar" style="width:100%; position: absolute; top: 50%; height: 435; background-color: rgb(0,10,255); margin: -214px 0 0 -0;">
</div>
<div id ="content" style="position: relative; left:50%; top:50%; margin: -212px 0 0 -475px">
    <div id="janrainEngageEmbed" style="position: relative; top:50%; left:50%; margin: -78px 0 0 -190px; width: 380px;"></div>
</div>
</div>