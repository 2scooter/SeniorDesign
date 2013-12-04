<?php
$q = intval($_GET['q']);
 $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
 if (mysqli_connect_errno($con))
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $result = mysqli_query($con,"SELECT * FROM presentation WHERE slideNumber = " . $q);
 $count = 0;

$row = mysqli_fetch_array($result);
?>


<?php

 if($row['slidetype'] == "image")
  {                        
   $currentQuery = mysqli_query($con,"SELECT * FROM presentationImages WHERE imageId = " . $row['imageId']);                                
   while($currentRow = mysqli_fetch_array($currentQuery))
    {
    echo '<img id="slide" style="max-width:675px; max-height: 500px" src=' . $currentRow['imageURL'] . '>'; 
    }
  }
  else if($row['slidetype'] == "question")
  {
       $currentQuery = mysqli_query($con,"SELECT * FROM presentationQuestions WHERE questionId = " . $row['questionId']); 
        while($currentRow = mysqli_fetch_array($currentQuery))
        {
        echo'                                
    <form id = "newPresentationQuestion">
    Question <br>
    <input type = "text" name = "question" size = "50" value = "' . $currentRow['question'] . '"><br>
    Correct Answer<br>
    <input type = "text" name = "answerOne" size = "50" value = "' . $currentRow['answerOne'] . '"><br>
    Wrong Answer One<br>
    <input type = "text" name = "answerTwo" size = "50" value = "' . $currentRow['answerTwo'] . '"><br>
    Wrong Answer Two<br>
    <input type = "text" name = "answerThree" size = "50" value = "' . $currentRow['answerThree'] . '"><br>
    Wrong Answer Three<br>
    <input type = "text" name = "answerFour" size = "50" value = "' . $currentRow['answerFour'] . '">
    <input type="hidden" id="questionId" name="questionId" value = "' . $currentRow['questionId']. '" />
    <br>
    <input type = "radio" value="A" name="correctAnswer"'; if($currentRow['correctAnswer'] == "A") echo 'checked'; echo'
    >A<input type = "radio" value="B" name="correctAnswer"'; if($currentRow['correctAnswer'] == "A") echo 'checked'; echo'>B<input type = "radio" value="B" name="correctAnswer"';
    if($currentRow['correctAnswer'] == "C") echo 'checked'; echo'>C<input type = "radio" value="D" name="correctAnswer"'; if($currentRow['correctAnswer'] == "D") echo 'checked'; echo'>D
                        
    </form>
    <br>
    <a id="questionSave" href="#" class="btn btn-primary">
      Save
    </a>';
        } 
   }                    
   else if($row['slidetype'] == "video")
  {
   $currentQuery = mysqli_query($con,'SELECT * FROM presentationVideos WHERE videoId = '  . $row['videoId']);                                
    $currentRow = mysqli_fetch_array($currentQuery);
   echo'
  <iframe width="560" height="315" src="' .$currentRow['videoURL'] . ' " frameborder="0" allowfullscreen></iframe>';
      
  }
                                    
   


mysqli_close($con);
?>