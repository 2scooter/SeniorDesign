<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'INSERT INTO presentationImages(imageURL)
  VALUES ("' . $_POST['image'] . '")';
  mysqli_query($con, $myQuery);
  $myQuery = 'SELECT * FROM presentationImages where imageURL = "' . $_POST['image'] . '"';
  $result = mysqli_query($con, $myQuery);
  $row = mysqli_fetch_array($result);
  $myQuery = '
  SELECT * 
FROM  `presentation` 
WHERE moduleId = '. $_POST['moduleId'] .'
ORDER BY  `position` DESC 
LIMIT 1
';
  $result = mysqli_query($con,$myQuery);
  $highestPosition = mysqli_fetch_array($result);  
  $value = $highestPosition['position'] + 1;
  $myQuery = 'INSERT INTO presentation(imageId,moduleId,position) VALUES (' . $row['imageId'] . ',' . $_POST['moduleId'] . ',' . $value . ')';
  mysqli_query($con, $myQuery);
?>