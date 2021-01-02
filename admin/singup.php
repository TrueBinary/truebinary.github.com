<?php include("../config.php") ?>
<!DOCTYPE html>
<html>

<head>
    <title>LifeBlog | Sing Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../static/page.css" rel="stylesheet">
    <link href="../static/blog.css" rel="stylesheet">
    <meta name="theme-color" content="#563d7c">

</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo_div">
                <a href="index.php">
                    <h1>LifeBlog</h1>
                </a>
            </div>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="about">About</a></li>
            </ul>
        </div>
        <form class="form-register" name="singup" action="register.php" method="POST">
            <h1>Sing Up</h1>
            <div class="form-group" class="error-msg" id="error-msg">
                <?php require_once "messages.php"; ?>
                <label for="exampleInputUsername"><span class="required error" id="Username-info">Username</span></label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby=" usernameHelp" placeholder="Enter email">

            </div>
            <div class="form-group" class="error-msg" id="error-msg">
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
            <button type="submit" class="btn btn-success" name="signup-btn" id="singup-btn">Submit</button>
        </form>
    </div> <!-- /container -->
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
</body>

</html>