<?php

session_start();

if(empty($_SESSION["token"])){
    $_SESSION["messages"] [] = "Token has been expired";
    header("Location: singup.php");
    exit;
}
var_dump($_GET);
