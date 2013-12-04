<?php  
$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
$i = 1;

foreach ($_POST['item'] as $value) {
    $myQuery = 'UPDATE presentation SET position = '. $i .' WHERE slidenumber = '. $value;
    mysqli_query($con,$myQuery);
    $i++;
}
?>