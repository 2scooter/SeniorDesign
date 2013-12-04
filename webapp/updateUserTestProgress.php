<?php 
session_start();
 $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo"); 
 $myQuery = 'SELECT * FROM users WHERE accountId = "' . $_SESSION['identifier'] . '"';
 $currentUser = mysqli_query($con,$myQuery);
 $currentUser = mysqli_fetch_array($currentUser);
 if($_POST['testScore'] >= $currentUser['testscore'])
 {
     $myQuery = 'UPDATE users SET testScore = ' . $_POST['testScore'] . ' WHERE accountId = "' . $_SESSION['identifier'] . '"';
     mysqli_query($con,$myQuery);
     if($_POST['testScore'] == 100)
     {
        $myQuery = 'UPDATE users SET testCompleted = "Pass" WHERE accountId = "' . $_SESSION['identifier'] . '"';
        mysqli_query($con,$myQuery);
        echo "<br>You passed the test and are now certified to judge the science and engineering challenge!";
     }
     else
     {
        $myQuery = 'UPDATE users SET testCompleted = "Fail" WHERE accountId = "' . $_SESSION['identifier'] . '"';    
        mysqli_query($con,$myQuery);
        echo "<br>You failed the test and need every answer correct to be certified to judge the science and engineering challenge.";
     }
 }
 else
 {
     echo "<br>You failed the test and need every answer correct to be certified to judge the science and engineering challenge.";
 }
 ?>