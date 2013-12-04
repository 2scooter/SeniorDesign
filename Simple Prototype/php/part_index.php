<html>

    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
        </script>
        <script type="text/javascript" src="formScript.js"></script>
        <script type="text/javascript" src="fading_file.js"></script>
        <script type="text/javascript"></script>
        <script src="formScript.js"></script>
        <link rel="stylesheet" type="text/css" href="formStyleSheet.css">       
        <link rel="shortcut icon" href="siue_image.gif"> 
        <title>Parts Site Index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>

    <body>
        <h1 align='center'>Welcome to the Parts Site Index!</h1>
    </body>
        <?PHP
    $mysqli = connect($mysqli);

    function connect(&$mysqli) {
        /*re-add password*/
        $mysqli = new mysqli("home.cs.siue.edu", "nwhitwo", "4MnB1Sd3");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("The Connection Failed: %s\n", $mysqli->connect_error);
            exit();
        }
        return $mysqli;
    }
    
    mysqli_select_db($mysqli, "nwhitwo");
    $sqli = "SELECT partName, partPrice 
        FROM part;";
    $result = mysqli_query($mysqli, $sqli);
    
    while($row = mysqli_fetch_array($result)){
        echo $row['partname'] . " " . 
                $row['partPrice'] . " ";
        echo "<br />";
    }
    

   
    ?>
    
    
    
</html>