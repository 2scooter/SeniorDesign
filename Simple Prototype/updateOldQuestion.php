<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'UPDATE testquestions
  SET question = "' . $_POST['question'] . '",
  wrongAnswerOne = "' . $_POST['wrongAnswerOne'] .'",
  wrongAnswerTwo = "' . $_POST['wrongAnswerTwo'] .'",
  wrongAnswerThree = "' . $_POST['wrongAnswerThree'] .'",
  correctAnswer = "' . $_POST['correctAnswer'] .'"
  WHERE questionId = ' . $_POST['questionId'];
  if(!empty($_POST['question']))
  {      
      mysqli_query($con, $myQuery);
  } 
  

?>