<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'INSERT INTO presentationVideos(videoURL)
  VALUES ("' . $_POST['videoURL'] . '")';
  mysqli_query($con, $myQuery);
  $myQuery = 'SELECT * FROM presentationVideos WHERE videoURL = "' . $_POST['videoURL'] . '"';
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
  $myQuery = 'INSERT INTO presentation(slidetype, videoId, position, moduleId) 
  VALUES ("video",' . $row['videoId'] . ',' . $value . ',' . $_POST['moduleId'] .')';
  mysqli_query($con,$myQuery);
?>