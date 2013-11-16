<?php
    $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");   
    $myQuery = 'SELECT * FROM module ORDER BY moduleId ASC';
    $result = mysqli_query($con,$myQuery);
    while($row = mysqli_fetch_array($result))
    {    
    echo '<a href="#" style="text-decoration:none;color:white" id = '. $row['moduleId'] . '>' . $row['moduleName'] .'</a><br>';
    }
?>