<?php

    $servername = 'localhost';
    $serveruser = 'root';
    $serverpwd = '';
    $dbName = 'riphah_db';

    $dbCon = mysqli_connect($servername, $serveruser, $serverpwd, $dbName);

    if($dbCon) {
        echo "<h1>Conncection Successful</h1>";
    } else {
        echo "<h1>No Conncection</h1>";
    }

?>