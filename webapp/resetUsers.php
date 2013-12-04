<?php
    $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");  
    $myQuery = 'UPDATE users 
    SET current = "0"
    ,trainingprogress = "1"
    ,moduleProgress = "1"
    ,testscore = "0"
    ,testCompleted = ""
    ,trainingComplete = "0"
    ,moduleProgress = "1"
    ,testCompleted = "N/A"';
    mysqli_query($con,$myQuery);
?>