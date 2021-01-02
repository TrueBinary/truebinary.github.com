<?php
    session_start();
    $conn = mysqli_connect("127.0.0.1","mrtrue", "teste", "userregister");

    if(!$conn){
        die("Error connecting to database" . mysqli_connect_error());
    }

    define("ROOT_PATH", realpath(dirname(__FILE__)));
    define("BASE_URL", "http://localhost:8080/");
?>