<?php session_start();
 $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
 if (mysqli_connect_errno($con))
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $myQuery = 'SELECT * FROM users WHERE accountid = "' . $_SESSION['identifier'] . '"';
 $currentUser = mysqli_query($con, $myQuery);
 $currentUser = mysqli_fetch_array($currentUser);
 $result = mysqli_query($con,'SELECT * FROM presentation WHERE moduleId = ' . $currentUser['moduleProgress'] . ' AND position <= '. $currentUser['trainingprogress'] .' OR moduleId < ' . $currentUser['moduleProgress'] . ' ORDER BY moduleId,position ASC');
$count = 0;
 while($row = mysqli_fetch_array($result))
 {
  echo '<div class = "item" id='.$row['moduleId']. '_' . $row['position'] . '>'; 
 
  if($row['slidetype'] == "image")
  {                        
   $currentQuery = mysqli_query($con,'SELECT * FROM presentationImages WHERE imageId = ' . $row['imageId'] );                                
   while($currentRow = mysqli_fetch_array($currentQuery))
    {
    echo '<img id="slide" style="max-height: 371px" src=' . $currentRow['imageURL'] . '>'; 
    }
  }
  else if($row['slidetype'] == "question")
  {
       $currentQuery = mysqli_query($con,"SELECT * FROM presentationQuestions WHERE questionId = " . $row['questionId']); 
        while($currentRow = mysqli_fetch_array($currentQuery))
        {
        echo'                                
    <p>
        <font size="6"> '. $currentRow['question'] . '</font>
    </p>

    <div>                                                            
        <input type="radio" name="group1" value="A">                                   
        ' . $currentRow['answerOne'] . '<br><br>
        <input type="radio" name="group1" value="B">
        ' . $currentRow['answerTwo'] . '<br><br>
        <input type="radio" name="group1" value="C">
        ' . $currentRow['answerThree'] . '<br><br>';
        if($currentRow['answerFour'] != '')
        {
        echo'<input type="radio" name="group1" value="D"> ' . $currentRow['answerFour'] . '<br>';
        }
    echo'</div>';
    echo'<br><br>';
    echo'<div id="testResult"></div>';
  }
  }       
  else if($row['slidetype'] == "video")
  {
   $currentQuery = mysqli_query($con,"SELECT * FROM presentationVideos WHERE videoId = " . $row['videoId']);                                
    $currentRow = mysqli_fetch_array($currentQuery);
   echo'
  <iframe width="560" height="315" src="' .$currentRow['videoURL'] . ' " frameborder="0" allowfullscreen></iframe>';
      
  }
  echo '</div>';
  $count++;

 }
 echo '<div class = "item" style="font-size:20px">
 You completed the training session! <br><br>
 You may now take the test! Click take test to begin!<br><br>
 <a href="test.php" class="btn btn-large btn-primary">Take test</a>
 </div>';


?>