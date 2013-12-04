<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'SELECT * FROM presentation
  WHERE slidenumber = ' . $_POST['slideId'];
  $result = mysqli_query($con, $myQuery);
  $row = mysqli_fetch_array($result);
  $currentModule = $row['moduleId'];
	if($row['slidetype'] == "image")
	{
		$myQuery = 'DELETE FROM presentationImages WHERE imageId = ' . $row['imageId'];
		mysqli_query($con, $myQuery);
    }
    else if($row['slidetype'] == "question")
    {
		$myQuery = 'DELETE FROM presentationQuestions WHERE questionId = ' . $row['questionId'];
		mysqli_query($con, $myQuery);
    }
    else if($row['slidetype'] == "video")
    {
		$myQuery = 'DELETE FROM presentationVideos WHERE videoId = ' . $row['videoId'];
		mysqli_query($con, $myQuery);
    }
    $myQuery = 'DELETE from presentation WHERE slidenumber = ' . $_POST['slideId'];
    mysqli_query($con,$myQuery);
    $myQuery = 'SELECT * FROM presentation WHERE moduleId = ' . $currentModule . ' ORDER BY position ASC';
    $currentSlide = mysqli_query($con,$myQuery);
    $count = 1;
    while($row = mysqli_fetch_array($currentSlide))
    {
        $myQuery = 'UPDATE presentation SET position = '.$count.' WHERE slidenumber = '.$row['slidenumber'];
        mysqli_query($con,$myQuery);
        $count++;
    }
    

?>