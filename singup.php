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
    <script src="jquery-3.5.1.js" type="text/javascript"></script>
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
        <div class=" form-group" class="error-msg" id="error-msg">
            <label for="exampleInputEmail"><span class="required error" id="email-info">Email address</span></label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby=" emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exempleInputPassword"><span class="required error" id="signup-password-info">Password</span></label>
            <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exempleInputCpassword"><span class="required error" id="confirm-password-info">Confirm Password</></label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Cofirm Password">
            <small id="email-info" class="form-text text-muted">Make sure to type the same password </small>
        </div>
        <button type="submit" class="singup-btn" name="signup-btn" id="singup-btn">Submit</button>
    </form>
    <script type="text/javascript">
        function signupValidation() {
            var valid = true;
            $("#email").removeClass("error-field");
            $("#password").removeClass("error-field");
            $("#confirm-password").removeClass("error-field");

            var email = $("#email").val();
            var Password = $('#signup-password').val();
            var ConfirmPassword = $('#confirm-password').val();
            var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

            $("#email-info").html("").hide();


            if (email == "") {
                $("#email-info").html("required").css("color", "#ee0000").show();
                $("#email").addClass("error-field");
                valid = false;
            } else if (email.trim() == "") {
                $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
                $("#email").addClass("error-field");
                valid = false;
            } else if (!emailRegex.test(email)) {
                $("#email-info").html("Invalid email address.").css("color", "#ee0000")
                    .show();
                $("#email").addClass("error-field");
                valid = false;
            }
            if (Password.trim() == "") {
                $("#signup-password-info").html("required.").css("color", "#ee0000").show();
                $("#signup-password").addClass("error-field");
                valid = false;
            }
            if (ConfirmPassword.trim() == "") {
                $("#confirm-password-info").html("required.").css("color", "#ee0000").show();
                $("#confirm-password").addClass("error-field");
                valid = false;
            }
            if (Password != ConfirmPassword) {
                $("#error-msg").html("Both passwords must be same.").show();
                valid = false;
            }
            if (valid == false) {
                $('.error-field').first().focus();
                valid = false;
            }
            return valid;
        }
    </script>
</body>

</html>