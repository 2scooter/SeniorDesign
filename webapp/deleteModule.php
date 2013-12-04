<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  

  
  $myQuery = 'SELECT * FROM presentation WHERE moduleId = ' . $_POST['moduleId'];  
  $result = mysqli_query($con, $myQuery);
  while($row = mysqli_fetch_array($result))
  {
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
    
    $myQuery = 'DELETE from presentation WHERE slidenumber = ' . $row['slidenumber'];
    mysqli_query($con,$myQuery);

    $myQuery = 'SELECT * FROM presentation WHERE moduleId > ' .$_POST['moduleId'];
    $currentResult = mysqli_query($con,$myQuery);
    while($currentSlide = mysqli_fetch_array($currentResult))
    {
        $newModule = $currentSlide['moduleId'] - 1;
        $myQuery = 'UPDATE presentation SET moduleId = ' . $newModule . ' WHERE slidenumber = ' . $currentSlide['slidenumber'];   
        mysqli_query($con,$myQuery);
    }
  }  
    $myQuery = 'DELETE FROM module WHERE moduleId = ' . $_POST['moduleId'];
    mysqli_query($con,$myQuery);
    $myQuery = 'SELECT * FROM module WHERE moduleId > ' . $_POST['moduleId'];
    $moduleRow = mysqli_query($con,$myQuery);
    while($currentModule = mysqli_fetch_array($moduleRow))
    {
        $newModuleId = $currentModule['moduleId'] - 1;
        $myQuery = 'UPDATE module SET moduleId = '. $newModuleId . ' WHERE moduleId = ' . $currentModule['moduleId'];
        mysqli_query($con,$myQuery);        
    }
    

?>