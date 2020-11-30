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

$dsn = "mysql:host=127.0.0.1;dbname=userregister";
$dbUser = 'mrtrue';
$dbPassword = "teste";
try{
    $connection = new PDO($dsn,$dbUser, $dbPassword);
} catch(PDOException $exception){
    $_SESSION["messages"] [] = "connection failed: " . $exception->getMessage();
    header("Location: singup.php");
    exit;
}

$statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
if($statement){
    $statement->execute([
        ":email" => $data["email"]
    ]);
 
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($result)){
        $_SESSION["messages"] [] = "The user with this email already exists!";
        header("Location: singup.php");
        exit();
    }
}

$statement = $connection->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
if($statement){
    $result =  $statement->execute([
        ":email" => $data["email"],
        ":password" => $data["password"],
    ]);
    if($result){
        $_SESSION["token"] = hash("sha256", uniqid());

        $to = $data["email"];
        $message = sprintf(
                "Hi %s, Please Confirm your registration https://127.0.0.1/3000/confirm.php?%s",
                $data["email"],
                http_build_query([
                    "token" => $_SESSION["token"],
                    "email" => $to
                ])
            );

        $headers = "From:Mrtrue  <gui15787@gmail.com>";

        mail($to, "[MrTrue Painel] User Registration", $message, $headers);
        echo "The email message was sent.";

        $_SESSION["messages"] [] = "Your registration is complete with success";
        header("Location: singup.php");
        exit;
    }
}
