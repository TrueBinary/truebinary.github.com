<?php

session_start();

$data = $_POST;

if (empty($data['email']) ||
    empty($data['password']) ||
    empty($data['confirm-password'])){
        $_SESSION["messages"] [] = "Please fill all required fields";
        header("Location: singup.php");
        exit;
}

if($data["password"] !== $data["confirm-password"]){
    $_SESSION["messages"] [] = "Password Doesn't match check if you typed right!";
    header("Location: singup.php");
    exit;
}

$dsn = "mysql:dbname=userregister;host=localhost";
$dbUser = 'mrtrue';
$dbPassword = "teste";
try{
    $connection = new PDO($dsn,$dbUser, $dbPassword);
} catch(PDOException $exception){
    $_SESSION["messages"] [] = "connection failed: " . $exception->getMessage();
    header("Location: singup.php");
    exit;
}