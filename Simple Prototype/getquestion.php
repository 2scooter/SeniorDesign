<?php
$q = intval($_GET['q']);
 $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
 if (mysqli_connect_errno($con))
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 $result = mysqli_query($con,"SELECT * FROM testquestions WHERE questionId = " . $q);
 $count = 0;

$row = mysqli_fetch_array($result);
mysqli_close($con);
?>


<?php echo'
        <form id="oldQuestionForm">     
            <h5>Question:</h5>
            <input type="text" id="question" name="question" size="50" value = "'. $row['question'] . '"/>
            <h5>Correct Answer:</h5>
            <input type="text" id="correctAnswer" name="correctAnswer" size="50" value = "'. $row['correctAnswer'] . '"/>
            <h5>Wrong Answer One:</h5>
            <input type="text" id="wrongAnswerOne" name="wrongAnswerOne" size="50" value = "' . $row['wrongAnswerOne']. '"/>
            <h5>Wrong Answer Two:</h5>
             <input type="text" id="wrongAnswerTwo" name="wrongAnswerTwo" size="50" value = "' . $row['wrongAnswerTwo']. '"/>
            <h5>Wrong Answer Three:</h5>
             <input type="text" id="wrongAnswerThree" name="wrongAnswerThree" size="50" value = "' . $row['wrongAnswerThree']. '"/>   
             <input type="hidden" id="questionId" name="questionId" value = "' . $row['questionId']. '" />
          </form> 
            <br>
            <a id="info-modal-save" href="#" class="btn btn-primary">
                Save
            </a>';
?>