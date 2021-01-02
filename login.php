<?php include('config.php'); ?>
<?php include('includes/singin.php'); ?>
<?php include('includes/head_section.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="../static/page.css" rel="stylesheet">
<title>LifeBlog | Sign in </title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->

        <div style="width: 40%; margin: 20px auto;">
            <form class="form-register" method="post" action="login.php">
                <h2>Login</h2>
                <div class="form-group">
                    <?php include(ROOT_PATH . '/includes/errors.php') ?>
                    <input type="text" class="form-control" aria-describedby=" emailHelp" name="email" value="<?php echo $email; ?>" value="" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="btn btn-success" name="login_btn">Login</button>
                </div>
                <p>
                    Not yet a member? <a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
    </div> <!-- /container -->


    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/footer.php'); ?>
    <!-- // Footer -->