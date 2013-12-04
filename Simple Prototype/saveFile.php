<?php
    $data = $_POST['data'];
    $f = fopen('resources/Judges.txt', 'w+');
    
    foreach ($_POST as $key => $value) {
        fwrite($f, $value);
    }
        fclose($f);

?>