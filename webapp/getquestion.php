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
            <h5>Answer A:</h5>
            <input type="text" id="answerOne" name="answerOne" size="50" value = "'. $row['answerOne'] . '"/>
            <h5>Answer B:</h5>
            <input type="text" id="answerTwo" name="answerTwo" size="50" value = "' . $row['answerTwo']. '"/>
            <h5>Answer C:</h5>
             <input type="text" id="answerThree" name="answerThree" size="50" value = "' . $row['answerThree']. '"/>
            <h5>Answer D:</h5>
             <input type="text" id="answerFour" name="answerFour" size="50" value = "' . $row['answerFour']. '"/>   
            <br>
            Correct Answer:
            <input type = "radio" value="A" name="correctAnswer" ';
            if($row['correctAnswer'] == "A") {echo 'checked';}; 
            echo'>A<input type = "radio" value="B" name="correctAnswer" ';
            if($row['correctAnswer'] == "B") {echo 'checked';}; 
            echo'>B<input type="radio" value="C" name="correctAnswer" ';if($row['correctAnswer'] == "C") {echo 'checked';}; 
            echo'>C<input type="radio" value="D" name="correctAnswer" ';if($row['correctAnswer'] == "D") {echo 'checked';}; 
            echo'>D<input type="hidden" id="questionId" name="questionId" />
             <input type="hidden" id="questionId" name="questionId" value = "' . $row['questionId']. '" />
          </form> 
            <br>
            <a id="info-modal-save" href="#" class="btn btn-primary">
                Save
            </a>';
?>