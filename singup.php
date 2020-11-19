<?php

use Phppot\Member;

if (!empty($_POST["signup-btn"])) {
    require_once '.Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="page.css" rel="stylesheet">
    <meta name="theme-color" content="#563d7c">

</head>

<body>
    <form class="form-register" name="singup" action="" method="post" onsubmit="return signupValidation()">
        <?php
        if (!empty($registrationResponse["status"])) {
        ?>
            <?php
            if ($registrationResponse["status"] == "error") {
            ?>
                <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
            <?php
            } else if ($registrationResponse["status"] == "success") {
            ?>
                <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
            <?php
            }
            ?>
        <?php
        }
        ?>
        <h1>Sing Up</h1>
        <div class=" form-group">
            <label for="exampleInputEmail">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby=" emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exempleInputPassword">Password</label>
            <input type="password" class="form-control" id="signup-password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exempleInputCpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-passowrd" placeholder="Cofirm Password">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password </small>
        </div>
        <button type="submit" class="singup-btn">Submit</button>
    </form>
    <script type="text/javascript" src="validation.js"></script>
</body>

</html>