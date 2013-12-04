<?php session_start();
$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");      
$myQuery = 'SELECT * FROM users WHERE accountid = "' . $_SESSION['identifier'] . '"';
$currentUser = mysqli_query($con,$myQuery);
$currentUser = mysqli_fetch_array($currentUser);
$myQuery = 'SELECT * FROM module ORDER BY moduleId DESC LIMIT 1';
$currentModuleId = mysqli_query($con,$myQuery);
$currentModuleId = mysqli_fetch_array($currentModuleId);
$userModuleProgress = $currentUser['moduleProgress'];
$userTrainingProgress = $currentUser['trainingprogress'];
$count = 0;
echo'<div class="list-group" id="questionButton">';
for($i = 1; $i <= $currentModuleId['moduleId']; $i++)
{
    echo'<div id="moduleWrap">';
    $myQuery = 'SELECT * FROM module WHERE moduleId = ' . $i;
    $currentModule = mysqli_query($con,$myQuery);
    $currentModule = mysqli_fetch_array($currentModule);
    if($i == $_POST['currentModule'])
        echo'<div style="cursor:pointer; font-size:20px;" class="list-group-item active" id="module">'.$currentModule['moduleName'].'</div><div id ="slides">';
    else
        echo'<div style="cursor:pointer; font-size:20px" class="list-group-item" id="module">'.$currentModule['moduleName'].'</div><div id="slides">';
    $myQuery = 'SELECT * FROM presentation WHERE moduleId = '.$i.' ORDER BY position DESC LIMIT 1';
    $numberOfSlides = mysqli_query($con,$myQuery);
    $numberOfSlides = mysqli_fetch_array($numberOfSlides);
    for($slideCount = 1; $slideCount <= $numberOfSlides['position']; $slideCount++)
    {
        if(($slideCount == $_POST['currentSlide'])&&($i == $_POST['currentModule']))
            echo'<a href="#" style="background-color: #8bc9ff; color:white" class="list-group-item" id="'.$count.'">Slide '.$slideCount.'</a>';
        else
            echo'<a href="#" class="list-group-item" id="'.$count.'">Slide '.$slideCount.'</a>';
            $count++;
    }
    echo '</div>';
    echo '</div>';

}
echo '</div></div>';

?>