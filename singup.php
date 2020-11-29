<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="page.css" rel="stylesheet">
    <meta name="theme-color" content="#563d7c">

</head>

<body>
    <?php require_once "messages.php"; ?>
    <form class="form-register" name="singup" action="register.php" method="POST">
        <h1>Sing Up</h1>
        <div class="form-group" class="error-msg" id="error-msg">
            <?php require_once "messages.php"; ?>
            <label for="exampleInputEmail"><span class="required error" id="email-info">Email address</span></label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby=" emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="exempleInputPassword"><span class="required error" id="signup-password-info">Password</span></label>
            <input type="password" class="form-control" id="signup-password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exempleInputCpassword"><span class="required error" id="confirm-password-info">Confirm Password</></label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Cofirm Password">
            <small id="email-info" class="form-text text-muted">Make sure to type the same password </small>
        </div>
        <button type="submit" class="singup-btn" name="signup-btn" id="singup-btn">Submit</button>
    </form>
</body>

</html>