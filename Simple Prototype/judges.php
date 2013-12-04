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
  $result = mysqli_query($con,"SELECT * FROM users WHERE accesslevel = 'Judge' and current = '1'");

 mysqli_close($con);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/dataTables.css">
        <link href="css/common.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <img id="logo" src="images/logo.png"/>
            <div id="heads">
                <div id="headerText">
                    Regional Science and Engineering Challenge
                </div>
                <div id="whiteline" style="height:2px; background-color:white; width:700px; margin-left:auto; margin-right:auto; top:40px;"></div>
            </div>
            <div id="tabspace"></div>
            <!--<div id="returnedData">Data should return here</div>-->

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
                        if($_SESSION['accesslevel'] == "Admin" || $_SESSION['accesslevel'] == "View-Only")
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
                                        <li id="tabHeader_7" tab = "1"><a style="color:tomato; text-decoration: none;" href="judges.php">View Judges</a></li>
                                        <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
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
            <iframe style="display:none;" name="target"></iframe>
             <?php
                if($_SESSION['accesslevel'] == "Admin")
                    echo '         
                    <a id="clear-button" href="#" class="btn btn-primary" style="margin-bottom:20px;">
                            Clear List
                    </a>';
            ?>
            <a id="download-button" href="getFile.php" class="btn btn-primary" style="margin-bottom:20px;">
                    Download List
            </a>

            <table class="table table-striped" id="user-content">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Module</th>
                        <th>Slide</th>
                        <th>Test Score %</th>
                        <th>Test Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo '<td id = "name">';
                            echo $row['last_name'];
                            echo ", ";
                            echo $row['first_name'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['moduleProgress'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['trainingprogress'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['testscore'];
                            echo "</td>";                           
                            echo "<td>";
                            echo $row['testCompleted'];
                            echo "</td>";                           
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
   
        <div class="container" style="margin-top:30px;">
       
            <table class="table table-striped" id="user-content" >
            </table>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="tableEdit.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/paging.js"></script>
        <script src="js/judges.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready( function () {
            $('#user-content').dataTable( {
            "bPaginate": false
            });
            });
        </script>
        <script type="text/javascript" src="js/dropdown.js"></script>

    </body>
</html>
