<?php
    $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");   
    $myQuery = 'SELECT * FROM module ORDER BY moduleId ASC';
    $result = mysqli_query($con,$myQuery);
    $i = 1;
    while($currentModule = mysqli_fetch_array($result))
    {
        $currentModule['moduleId'] = $i;
        $i++;
    }
    $newValue = $i;
    $myQuery = 'INSERT INTO module(moduleId,moduleName) VALUES ("'. $newValue . '","' . $_POST['newModule'] . '")';
    mysqli_query($con,$myQuery);
?>