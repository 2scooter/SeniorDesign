<?php
   $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
   if (mysqli_connect_errno($con))
   {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $result = mysqli_query($con,"SELECT * FROM presentation");
   $count = 1;
   while($row = mysqli_fetch_array($result))
   {
    if($count == 1)
    {
        echo '<a href="#" class="list-group-item active"  id = "'. $row['slidenumber']. '">';
        echo 'Slide '. $count;
        echo '</a> ';
    }
    else
    {                                  
        echo '<a href="#" class="list-group-item" " id = "'. $row['slidenumber']. '">';
        echo 'Slide '. $count;
        echo '</a> ';
    }                                        
    $count++;                
   }
  echo '<a href="#" class="list-group-item" id = "">';
  echo 'New slide...';
  echo '</a> ';
?>
