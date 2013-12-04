<?php 

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $myQuery = 'INSERT INTO testquestions(question,answerOne,answerTwo,answerThree,answerFour,correctAnswer)
  VALUES ("' . $_POST['question'] . '","' . $_POST['answerOne'] .'","' . $_POST['answerTwo'] .'","' . $_POST['answerThree'] .'","' . $_POST['answerFour'] .'","'.$_POST['correctAnswer'].'")';
  if(!empty($_POST['question']))
  {      
      mysqli_query($con, $myQuery);
  }
?>