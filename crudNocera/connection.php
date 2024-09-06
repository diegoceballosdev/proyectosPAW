<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "simplecruddb";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$con) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
