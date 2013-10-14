<?php session_start();

$con=mysqli_connect("steminfo.db.10915569.hostedresource.com","steminfo","Outreach4!","steminfo");
  // Check connection
  if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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

            <div id="tabContainer">
                <div style="margin-top:-45px;" id="tabs">
                    <ul id="tabslist">
                        <li id="tabHeader_1" tab = "1">
                            <tab><a style="text-decoration: none;" href="index.php">Home</a></tab>
                        </li>
                        <li id="tabHeader_2" tab = "1">
                            <tab><a style="text-decoration: none;" href="presentation.php">Presentation</a></tab>
                        </li>
                        <li id="tabHeader_3" tab = "1">
                            <tab><a style="text-decoration: none;" href="test.php">Test</a></tab>
                        </li>
                        <li tab = "0">
                            <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1); setLeft()" onmouseout="ddMenu('one',-1)"><a style="text-decoration: none;">Administration</a></dt>
                        </li>
                        <li>
                            <tab><a style="text-decoration: none;" href="contact.php">Contact Us</a></tab>
                        </li>
                    </ul>
                    <div id="dropdown">
                        <div id="one-ddcontainer">
                            <dl class="dropdown">
                                <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                                    <div style="width:950px; height:2px; background-color:white; margin-top:3px; left:50%; margin-left:-475px; position:absolute;"></div>
                                    <ul style="margin-left:-425px;">
                                        <li id="tabHeader_7" tab = "1"><a style="color:tomato; text-decoration: none;" href="judges.php">View Judges</a></li>
                                        <li id="tabHeader_8" tab = "1"><a style="text-decoration: none;" href="users.php">Edit Users</a></li>
                                        <li id="tabHeader_9" tab = "1"><a style="text-decoration: none;">Edit Presentation</a></li>
                                        <li id="tabHeader_10" tab = "1"><a style="text-decoration: none;">Edit Test</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container" style="margin-top:30px;">
            <table class="table table-striped" id="user-content">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Access Level</th>
                        <th>Test Progress</th>
                        <th>Test Score</th>
                        <th>Training Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>";
                            echo $row['email'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['accesslevel'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['testprogress'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['testscore'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['trainingprogress'];
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>



            <div class="container" style="margin-top:30px;">
                <a id="print-button" href="#" class="btn btn-primary" style="background-color:rgb(68, 68, 68); float:right; margin-bottom:20px;">
                    Print List
                </a>
                <table class="table table-striped" id="user-content" >
                </table>
            </div>


            <div class="modal hide fade" id="info-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                        &times;
                    </button>
                    <h3>
                    </h3>
                    <h5>
                    </h5>
                </div>
                <div class="modal-body">
                    <p>
                    </p>
                </div>
                <div class="modal-footer">
                    <a id="history-link" href="#" class="btn btn-primary" style="float:left;">
                        Metric history
                    </a>
                    <a id="info-modal-close" href="#" class="btn">
                        Close
                    </a>
                </div>
            </div>

            <div class="modal hide fade" id="message-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4>
                    </h4>
                </div>
                <div class="modal-body">
                    <h5>
                    </h5>
                </div>
                <div class="modal-footer">
                    <a id="message-modal-close" href="#" class="btn btn-primary">
                        Close
                    </a>
                </div>
            </div>

        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="tableEdit.js"></script>
        <script src="js/judges.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/paging.js"></script>
                <script type="text/javascript" charset="utf-8">
                    $(document).ready( function () {
                    var oTable = $('#user-content').dataTable( {
                    "bPaginate": false
                    } );
                       /* Apply the jEditable handlers to the table */
                        oTable.$('#accesslevel').editable( 'submit.php', {
                            "callback": function( sValue, y ) {
                                var aPos = oTable.fnGetPosition( this );
                                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                            },
                            "submitdata": function ( value, settings ) {
                                return {
                                    "row_id": $(this).closest("tr").attr('id') ,
                                    "column": $(this).closest("td").attr('id')
                                };
                            },
                        data   : " {'E':'Admin','F':'View-Only','G':'User', 'selected':'G'}",
                        type   : 'select',
                            "height": "30px",
                            "width": "100%",
                        } );
                    } );
        		</script>
        <script type="text/javascript" src="js/dropdown.js"></script>

    </body>
</html>
