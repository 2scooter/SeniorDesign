<?php
session_start();

ob_start();

$rpx_api_key = "6f7db617b7e06dd9497f089bee3d72648e03bbcd";

$engage_pro = false;

$token = $_POST['token'];

if(strlen($token) == 40) {
  $post_data = array('token'  => $token,
                     'apiKey' => $rpx_api_key,
                     'format' => 'json',
                     'extended' => 'false');

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

  $auth_info = json_decode($result, true);

  if ($auth_info['stat'] == 'ok') {
    $profile = $auth_info[profile];
    $email = $profile[email];
    $identifier = $profile[identifier];
$identifier = trim($identifier,"https://www.google.com/profiles/");
    $_SESSION['name'] = $identifier;
    $displayname = $profile[displayname];



$con=mysqli_connect("localhost","root","htam91","users");
$result = mysqli_query($con,"SELECT * FROM customers
WHERE accountid = '$identifier'");
if($result->num_rows > 0)
{
}
else
{
mysqli_query($con,"INSERT INTO customers (accountid, email, accesslvl, testprogress, testscore, trainingprogress)
VALUES ('$identifier','$email',0, 0,0,0)");
}

mysqli_close($con);

    } else {
      echo "\n".'An error occured: ' . $auth_info['err']['msg']."\n";
      var_dump($auth_info);
      echo "\n";
      var_dump($result);
    }
}else{
  echo 'Authentication canceled.';
}
$debug_out = ob_get_contents();
ob_end_clean();
?>

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
            <div id="whiteline" style="height:2px; `background-color: white; left:50%; width:950px; margin-left:-475px; top:100px; position: absolute;">
        </div>

    </div>
    <div id="tabspace"></div>

   <div>
        <?php if($_SESSION['name'] == "") : ?>
            <a class="janrainEngage" href="#">Login</a></li>
        <?php else : ?>
            <a href ="logout.php">Logout</a>
        <?php endif; ?>

   </div>

    <!--<div id="midline" style = "height:100%; width:1px; background-color:pink; position:absolute; left:50%;"></div>-->
    <img id="logo" src="images/logo.png"/>
    <div id="testfont">
        <h1> </h1>
    </div>

    <script src="js/login.js"></script>
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

