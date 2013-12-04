<?php
   $con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");                            
   $myQuery = 'SELECT * FROM presentation WHERE position = '. $_POST['currentSlide'] . ' AND moduleId = ' . $_POST['currentModule'];
   $result = mysqli_query($con,$myQuery);
   $currentQuestion = mysqli_fetch_array($result);
   $myQuery = 'SELECT * FROM presentationQuestions WHERE questionId = ' . $currentQuestion['questionId'];
   $result = mysqli_query($con,$myQuery);
   $currentQuestion = mysqli_fetch_array($result);
   if($currentQuestion['correctAnswer'] == $_POST['currentAnswer'])
   echo "Correct!";
   else
   echo "Wrong!";
   
   
   
?>
   
 