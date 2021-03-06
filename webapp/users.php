<?php session_start();
if(isset($_SESSION['identifier']))
{
    if($_SESSION['accesslevel'] == "Admin" || $_SESSION['accesslevel'] == "View-Only")
    {
    
    }
    else
    {
        header('Location: presentation.php');
    }    
}
else
    header('Location: login.php');


$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if(!empty($_POST['accountid']))
  {
      mysqli_query($con, '
      UPDATE users
      SET accesslevel = "' . $_POST["accesslevel"] . '",
      address = "' . $_POST["address"] . '",
      phone = "' . $_POST["phone"] . '",
      city = "' . $_POST["city"] . '", 
      state = "' . $_POST["state"] . '"
      WHERE accountid = "' . $_POST["accountid"] .'"');
  } 
  $result = mysqli_query($con,"SELECT * FROM users"); 

  


 mysqli_close($con);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-formhelpers.css">
        <link rel="stylesheet" href="css/modal.css">
        <link rel="stylesheet" href="css/dataTables.css">
        <link rel="stylesheet" href="css/common.css" type="text/css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Black+Ops+One' type='text/css'>
        <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
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
                <div style="margin-top:-45px;" id="tabs">
                    <ul id="tabslist">
                        <li id="tabHeader_1" tab = "1">
                            <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
                        </li>
                        <li id="tabHeader_2" tab = "1">
                            <tab><a style="text-decoration: none;" href="test.php">Test</a></tab>
                        </li>
                        <?php
                        if($_SESSION['accesslevel'] == "Admin"  || $_SESSION['accesslevel'] == "View-Only")
                            echo '
                        <li tab = "0" onmouseover="ddMenu(\'one\',1);" onmouseout="ddMenu(\'one\',-1)">
                            <dt id="one-ddheader" onclick="displayPage(2)"><a style="text-decoration: none;">Administration</a></dt>
                        </li>';
                        
                        ?>
                        <li id="tabHeader_3" tab = "1">
                            <tab><a style="text-decoration: none;" href="account.php">Account</a></tab>
                        </li>
                        <li id="tabHeader_4" tab = "1">
                            <tab><a style="text-decoration: none;" href="contact.php">Contact Us</a></tab>
                        </li>
                        <li id="tabHeader_5" tab = "1">
                            <tab><a style="text-decoration: none;" href="logout.php">Logout</a></tab>
                        </li>
                    </ul>
                    <div id="dropdown">
                        <div id="one-ddcontainer">
                            <dl class="dropdown">
                                <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                                    <div style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                                    <ul>
                                        <li id="tabHeader_7" tab = "1"><a style="text-decoration: none;" href="judges.php">View Judges</a></li>
                                        <li id="tabHeader_8" tab = "1"><a style="color:tomato; " href="users.php">Edit Users</a></li>
                                        
                                        <?php
                                            if($_SESSION['accesslevel'] == "Admin")
                                                echo '
                                            <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;" href="editpresentation.php">Edit Presentation</a></li>
                                            <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;" href="edittest.php">Edit Test</a></li>';
                                        ?>
                                   </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="margin-top:30px;">
                <table class="table table-striped" id="user-content" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Access Level</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '<tr id = "'. $row['accountid'] . '">';
                            echo '<td id = "name">';
                            echo $row['last_name'];
                            echo ", ";
                            echo $row['first_name'];
                            echo "</td>";
                            echo '<td id = "emailCell">';
                            echo $row['email'];
                            echo "</td>";
                            echo '<td id = "accesslevel">';
                            echo $row['accesslevel'];
                            echo "</td>";
                            echo '<td id = "info">';
                            echo '<a id="infoButton" href="#" class="btn">Info</a>';
                            echo "</td>";
                            echo '<input type ="hidden" id = "phoneCell" value = "'.$row['phone'] . '">';
                            echo '<input type ="hidden" id = "addressCell" value = "'.$row['address'] . '">';
                            echo '<input type ="hidden" id = "cityCell" value = "'.$row['city'] . '">';
                            echo '<input type ="hidden" id = "stateCell" value = "'.$row['state'] . '">';
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="info-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h3></h3>
                <form action="users.php" method="post" id="adminform">
                <div class="bfh-selectbox" style="margin-left:5%;">
                    <input type="hidden" id="access" name="accesslevel" value="Admin">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option bfh-selectbox-medium" id="typeText">user</span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <div role="listbox">
                            <ul role="option" id="idSelectbox" style="width:auto; height:85px;">
                            <li><a tabindex="-1" href="#" data-option="Admin">Admin</a></li>
                            <li><a tabindex="-1" href="#" data-option="View-Only">View-Only</a></li>
                            <li><a tabindex="-1" href="#" data-option="Judge">Judge</a></li>
                            <li><a tabindex="-1" href="#" data-option="Inactive">Inactive</a></li>
                            </ul>
                        </div>
                    </div>
               </div>
            </div>
            <div class="modal-body">
                <h5>Email:</h5>
                <input type="text" id="email" name="email" size="50" disabled/>
                <h5>Phone:</h5>
                <input type="text" id="phone" name="phone" size="50"/>
                <h5>Address:</h5>
                <input type="text" id="address" name="address" size="50"/>
                <h5>City:</h5>
                <input type="text" id="City" name="city" size="50" style="padding-bottom:4px;"/> <br>
                State: <br>
                <div class="bfh-selectbox" style="padding-top:2px;">
                    <input type="hidden" id="State" name="state">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option bfh-selectbox-medium" id="stateText"></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <div role="listbox">
                            <ul role="option"  style="width:auto; height: 100px;">
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
               <input type="hidden" id="accountid" name="accountid"/>    
            </div>
            <div class="modal-footer">
                <?php
                    if($_SESSION['accesslevel'] == "Admin")
                        echo '
                        <a id="info-modal-save" href="#" class="btn btn-primary">
                            Save
                        </a>';
                ?>
                <a id="info-modal-close" href="#" class="btn">
                    Close
                </a>
                </form>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/bootstrap-formhelpers-selectbox.js"></script>
        <script type="text/javascript" src="js/dropdown.js"></script>
        <script src="js/user.js"></script>

    </body>
</html>
