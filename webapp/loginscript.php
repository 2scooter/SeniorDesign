<?php session_start();
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
  /*
    echo "\n auth_info:";
    echo "\n"; var_dump($auth_info);
  */
    $profile = $auth_info[profile];
    $email = $profile[email];
    $identifier = $profile['identifier'];
    $identifier = trim($identifier,"https://www.google.com/profiles/");
    $firstName = $profile['name']['givenName'];
    $lastName = $profile['name']['familyName'];
    $_SESSION['firstName'] = $firstName;
    $_SESSION['identifier'] = $identifier;
    $_SESSION['email'] = $email;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['firstTime'] = "1";
    
    
    
    
    $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");

    $userQuery = 'SELECT * FROM users WHERE accountid = "' . $_SESSION['identifier'] . '"';    
    $user = mysqli_query($con,$userQuery);     
    $user = mysqli_fetch_array($user);

    if($user['trainingComplete'] == "1"){
        $_SESSION['finishPresentation'] = "1";
    }
    else{
        $_SESSION['finishPresentation'] = "0";
    }
    
    
    
    // DATABASE STUFF GOES HERE ===============================
  // Create connection
  $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  $myQuery = 'SELECT * FROM users WHERE accountID = "' . $identifier .'"';
  $query = 'UPDATE users
  SET current = "1"
  WHERE accountID = "' . $identifier .'"';
  $currentUser = mysqli_query($con,$myQuery);
  mysqli_query($con,$query);
  $currentUser = mysqli_fetch_array($currentUser);
  if($currentUser['accountid'] === NULL)
  // Check connection
  {
    header('Location: createAccount.php');
  }
  $_SESSION['accesslevel'] = $currentUser['accesslevel'];

  


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
