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
    echo '<img id="slide" style="max-width:100%;max-height:100%" src=' . $currentRow['imageURL'] . '>'; 
    }
  }
  else if($row['slidetype'] == "question")
  {
       $currentQuery = mysqli_query($con,"SELECT * FROM presentationQuestions WHERE questionId = " . $row['questionId']); 
        while($currentRow = mysqli_fetch_array($currentQuery))
        {
        echo'                                
    <h1>Question ' . $currentRow['questionId']. '</h1> 
    <form id = "newPresentationQuestion">
    Question <br>
    <input type = "text" name = "question" size = "50" value = "' . $currentRow['question'] . '"><br>
    Correct Answer<br>
    <input type = "text" name = "correctAnswer" size = "50" value = "' . $currentRow['correctAnswer'] . '"><br>
    Wrong Answer One<br>
    <input type = "text" name = "wrongAnswerOne" size = "50" value = "' . $currentRow['wrongAnswerOne'] . '"><br>
    Wrong Answer Two<br>
    <input type = "text" name = "wrongAnswerTwo" size = "50" value = "' . $currentRow['wrongAnswerTwo'] . '"><br>
    Wrong Answer Three<br>
    <input type = "text" name = "wrongAnswerThree" size = "50" value = "' . $currentRow['wrongAnswerThree'] . '">
    </form>
    <br>
    <a id="info-modal-save" href="#" class="btn btn-primary">
      Save
    </a>';
        } 
   }                    



mysqli_close($con);
?>