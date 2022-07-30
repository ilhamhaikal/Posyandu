<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "eposyandu";

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn){
        echo "Database tidak terhubung";
    }
?>