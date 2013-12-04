<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'UPDATE testquestions
  SET question = "' . $_POST['question'] . '",
  answerOne = "' . $_POST['answerOne'] .'",
  answerTwo = "' . $_POST['answerTwo'] .'",
  answerThree = "' . $_POST['answerThree'] .'",
  answerFour = "' . $_POST['answerFour'] .'",
  correctAnswer = "' . $_POST['correctAnswer'] . '"
  WHERE questionId = ' . $_POST['questionId'];
  if(!empty($_POST['question']))
  {      
      mysqli_query($con, $myQuery);
  } 
  

?>