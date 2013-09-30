<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/dataTables.css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/dropdown.css" type="text/css" />
</head>
<body>

<div id="wrapper">
    <div id="heads">
        <div id="headerText">
            Regional Science and Engineering Challenge
        </div>
            <div id="whiteline" style="height:2px; background-color: white;width:700px; margin-left:auto; margin-right:auto; top: 40px;"></div>
        </div>
    </div>
    <div id="tabspace"></div>

    <div id="tabContainer">
        <div id="tabs">
            <ul id="tabslist">
                <li id="tabHeader_1" tab = "1">
                    <tab><a href="index.php">Home</a></tab>
                </li>
                <li id="tabHeader_2" tab = "1">
                    <tab><a href="presentation.php">Presentation</a></tab>
                </li>
                <li id="tabHeader_3" tab = "1">
                    <tab><a href="test.php">Test</a></tab>
                </li>
                <li tab = "0">
                    <dt id="one-ddheader" onclick="displayPage(2)" onmouseover="ddMenu('one',1); setLeft()" onmouseout="ddMenu('one',-1)"><a style="text-decoration: none;">Administration</a></dt>
                </li>
                <li>
                    <tab><a href="contact.php">Contact Us</a></tab>
                </li>
            </ul>
            <div id="dropdown">
                <div id="one-ddcontainer">
                    <dl class="dropdown">
                        <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                            <div style="width:950px; height:2px; background-color:white; margin-top:20px; left:50%; margin-left:-475px; position:absolute;"></div>
                            <ul style="margin-left:-425px;">
                                <li id="tabHeader_7" tab = "1"><a style="color:tomato; text-decoration: none;" href="judges.php">View Judges</a></li>
                                <li id="tabHeader_8" tab = "1"><a href="users.php">Edit Users</a></li>
                                <li id="tabHeader_9" tab = "1"><a>Edit Presentation</a></li>
                                <li id="tabHeader_10" tab = "1"><a>Edit Test</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
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
<script src="js/judges.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/paging.js"></script>
<script type="text/javascript" src="js/dropdown.js"></script>

</body>
</html>
