<?php session_start(); 

if(isset($_SESSION['identifier']))
{
    
}
else
    header('Location: login.php');
    
if(!empty($_POST['firstName']))
{
$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");  
$myQuery = 'INSERT INTO users (first_name, last_name, address, 
phone, accountid, email, accesslevel, testscore, trainingprogress, Current, moduleProgress, city, state)
VALUES("' . $_POST['firstName'] . '", "' . $_POST['lastName'] . '", "' . $_POST['address'] . '",
" ' . $_POST['phoneArea'] . $_POST['phoneFirst'] . $_POST['phoneLast'] . '", "'. $_SESSION['identifier'] .'",
"' . $_SESSION['email'] . '", "' . $_POST['accesslevel'] . '", 0, 1, 1, 1, "' . $_POST['city'] . '",
"' . $_POST['state'] . '")';
mysqli_query($con,$myQuery);
header('Location: presentation.php');
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-formhelpers.css">
        <link rel="stylesheet" href="css/modal.css">
        <link rel="stylesheet" href="css/common.css" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Black+Ops+One' type='text/css'>

     </head>
    <body>
        <div id="wrapper">
            <img id="logo" src="images/logo.png"/>
            <div id="heads">
                <div id="headerText">
                    Regional Science and Engineering Challenge
                </div>
                <div id="whiteline" style="height:2px; background-color: white;width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>


            </div>
            <div id="tabspace"></div>

            <div id="tabContainer">
                <div style="margin-top:-45px;" >               
                        <center>                           
                                <tab><a style="text-decoration: none; font-size: 18px; color: white; font-family: 'Cinzel Decorative', cursive;" >New Account</a></tab>                         
                        </center>            
                </div>
            </div>


            <div class="container" style="margin-top:30px; width:60%;">
            <form action="createAccount.php" id="myForm" method="post">
                <?php echo'
                First Name:                
                <input type="text" id="First Name" name="firstName" style="margin-left:55px"; value="'.$_SESSION['firstName'].'" /> <br> <br> <br>

                Last Name:
                <input type="text" id="Last Name" name="lastName" style="margin-left:55px;" value="'.$_SESSION['lastName'].'">  <br> <br> <br>

                Email: 
                <input type="text" id="Email" name="email" style="margin-left:88px;" value="'.$_SESSION['email'].'" disabled> <br> <br> <br>
                
                Phone Number: <b style="margin-left:2em;">(</b>
                <input type="text" id="Phone" name="phoneArea"  maxlength="3" size="3">
                <b>)</b>
                <input type="text" id="Phone" name="phoneFirst" maxlength="3" size="3">
                <b>-</b>
                <input type="text" id="Phone" name="phoneLast" maxlength="4" size="4"><br> <br> <br>

                Home Address:
                <input type="text" id="Address" name="address" style="margin-left:30px;"> <br> <br> 
                City:
                <input type="text" id="City" name="city" style="margin-left:97px;"> <br> <br>
                State:
                <div class="bfh-selectbox" style="margin-left:88px;">
                    <input type="hidden" id="State" name="state">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option bfh-selectbox-medium">(Select)</span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <div role="listbox">
                            <ul role="option" id="idSelectbox" style="width:auto; height: 100px;">
                            <li><a tabindex="-1" href="#" data-option="AL">AL</a></li>
                            <li><a tabindex="-1" href="#" data-option="AK">AK</a></li>
                            <li><a tabindex="-1" href="#" data-option="AZ">AZ</a></li>
                            <li><a tabindex="-1" href="#" data-option="AR">AR</a></li>
                            <li><a tabindex="-1" href="#" data-option="CA">CA</a></li>
                            <li><a tabindex="-1" href="#" data-option="CO">CO</a></li>
                            <li><a tabindex="-1" href="#" data-option="CT">CT</a></li>
                            <li><a tabindex="-1" href="#" data-option="DE">DE</a></li>
                            <li><a tabindex="-1" href="#" data-option="FL">FL</a></li>
                            <li><a tabindex="-1" href="#" data-option="GA">GA</a></li>
                            <li><a tabindex="-1" href="#" data-option="HI">HI</a></li>
                            <li><a tabindex="-1" href="#" data-option="ID">ID</a></li>
                            <li><a tabindex="-1" href="#" data-option="IL">IL</a></li>
                            <li><a tabindex="-1" href="#" data-option="IN">IN</a></li>
                            <li><a tabindex="-1" href="#" data-option="IA">IA</a></li>
                            <li><a tabindex="-1" href="#" data-option="KS">KS</a></li>
                            <li><a tabindex="-1" href="#" data-option="KY">KY</a></li>
                            <li><a tabindex="-1" href="#" data-option="LA">LA</a></li>
                            <li><a tabindex="-1" href="#" data-option="ME">ME</a></li>
                            <li><a tabindex="-1" href="#" data-option="MD">MD</a></li>
                            <li><a tabindex="-1" href="#" data-option="MA">MA</a></li>
                            <li><a tabindex="-1" href="#" data-option="MI">MI</a></li>
                            <li><a tabindex="-1" href="#" data-option="MN">MN</a></li>
                            <li><a tabindex="-1" href="#" data-option="MS">MS</a></li>
                            <li><a tabindex="-1" href="#" data-option="MO">MO</a></li>
                            <li><a tabindex="-1" href="#" data-option="MT">MT</a></li>
                            <li><a tabindex="-1" href="#" data-option="NE">NE</a></li>
                            <li><a tabindex="-1" href="#" data-option="NV">NV</a></li>
                            <li><a tabindex="-1" href="#" data-option="NH">NH</a></li>
                            <li><a tabindex="-1" href="#" data-option="NJ">NJ</a></li>
                            <li><a tabindex="-1" href="#" data-option="NM">NM</a></li>
                            <li><a tabindex="-1" href="#" data-option="NY">NY</a></li>
                            <li><a tabindex="-1" href="#" data-option="NC">NC</a></li>
                            <li><a tabindex="-1" href="#" data-option="ND">ND</a></li>
                            <li><a tabindex="-1" href="#" data-option="OH">OH</a></li>
                            <li><a tabindex="-1" href="#" data-option="OK">OK</a></li>
                            <li><a tabindex="-1" href="#" data-option="OR">OR</a></li>
                            <li><a tabindex="-1" href="#" data-option="PA">PA</a></li>
                            <li><a tabindex="-1" href="#" data-option="RI">RI</a></li>
                            <li><a tabindex="-1" href="#" data-option="SC">SC</a></li>
                            <li><a tabindex="-1" href="#" data-option="SD">SD</a></li>
                            <li><a tabindex="-1" href="#" data-option="TN">TN</a></li>
                            <li><a tabindex="-1" href="#" data-option="TX">TX</a></li>
                            <li><a tabindex="-1" href="#" data-option="UT">UT</a></li>
                            <li><a tabindex="-1" href="#" data-option="VT">VT</a></li>
                            <li><a tabindex="-1" href="#" data-option="VA">VA</a></li>
                            <li><a tabindex="-1" href="#" data-option="WA">WA</a></li>
                            <li><a tabindex="-1" href="#" data-option="WV">WV</a></li>
                            <li><a tabindex="-1" href="#" data-option="WI">WI</a></li>
                            <li><a tabindex="-1" href="#" data-option="WY">WY</a></li>
                            </ul>
                        </div>
                    </div>
               </div>
               <br> <br> <br>
                
                Account Type:
                <div class="bfh-selectbox" style="margin-left:34px;">
                    <input type="hidden" id="AccountType" name="accesslevel">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option bfh-selectbox-medium">(Select)</span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <div role="listbox">
                            <ul role="option" id="idSelectbox" style="width:auto; height:45px;">
                            <li><a tabindex="-1" href="#" data-option="Judge">Judge</a></li>
                            <li><a tabindex="-1" href="#" data-option="PendingSTEM">STEM</a></li>
                            </ul>
                        </div>
                    </div>
               </div>
                
                <br> <br> <br>
                '?>
            </div>
            <center>
                <a id="submitButton" href="#" class="btn btn-primary">Submit</a>
            </center>
        </form>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/newAccount.js"></script>
        <script src="js/bootstrap-formhelpers-selectbox.js"></script>
    </body>
</html>
