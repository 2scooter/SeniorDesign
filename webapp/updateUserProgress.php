<?php 
header('Content-Type: text/plain');
session_start();
 $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");      
 $myQuery = 'SELECT * FROM users WHERE accountid = "' . $_SESSION['identifier'] . '"';
 $currentUser = mysqli_query($con,$myQuery);
 $currentUser = mysqli_fetch_array($currentUser);
 $myQuery = 'SELECT * FROM presentation WHERE moduleId = ' . $currentUser['moduleProgress'] . ' ORDER BY position DESC LIMIT 1';
 $highestSlidePosition = mysqli_query($con,$myQuery); 
 $highestSlidePosition = mysqli_fetch_array($highestSlidePosition);
 $myQuery = 'SELECT * FROM presentation ORDER BY moduleId DESC LIMIT 1';
 $highestModule = mysqli_query($con,$myQuery);
 $highestModule = mysqli_fetch_array($highestModule);
 $highestModule = $highestModule['moduleId'];
 $newModuleProgress = $currentUser['moduleProgress'] + 1;
 if(($_POST['currentSlide'] == $highestSlidePosition['position'])&&($_POST['currentModule'] == $currentUser['moduleProgress']))
 {
     if($currentUser['moduleProgress'] == $highestModule)
        echo "endofpresentation";
     else
     {
         $myQuery = 'UPDATE users SET moduleProgress = ' . $newModuleProgress . ', trainingProgress = 1 WHERE accountid = "' . $_SESSION['identifier']. '"';
         mysqli_query($con,$myQuery);
         echo "newmodule";
     }
 } 
 else {
     $newProgress = $currentUser['trainingprogress'] + 1;
     $myQuery = 'UPDATE users SET trainingprogress = ' . $newProgress . ' WHERE accountid = "' . $_SESSION['identifier'] . '"';
     if(($_POST['currentSlide'] >= $currentUser['trainingprogress'])&&($_POST['currentModule'] == $currentUser['moduleProgress']))
     {
        echo "update";
        mysqli_query($con,$myQuery); 
     }
     else
        echo "noupdate";
 }
 ?>
 