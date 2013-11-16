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
  $myQuery = 'SELECT * FROM presentation ORDER BY position DESC LIMIT 1';
  $result = mysqli_query($con, $myQuery);
  $positionRow = mysqli_fetch_array($result);
  $value = $positionRow['position'] + 1;
  $myQuery = 'INSERT INTO presentation(slidetype, videoId, position) 
  VALUES ("video",' . $row['videoId'] . ',' . $value .')';
  mysqli_query($con,$myQuery);
?>