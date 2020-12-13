<?php
require "database.php";
$id = null;
if ( !empty($_GET)) {
    $id = $_REQUEST["id"];
}
if ( null == $id) {
    header("Location: list.php");
}

if ( !empty($_POST)) {
    $emailError = null;
    $passwordError = null;

    $email = $_POST["email"];
    $password = $_POST["password"];

    $valid = true;

    if (empty($password)) {
        $emailError = "Please enter Password";
        $valid = false;
    }

    if (empty($email)) {
        $emailError = "Please enter Email Address";
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid Email Address";
        $valid = false;
    }

    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users SET email='$email', password='$password' WHERE id=$id";
        $q = $pdo->prepare($sql);
        $q->execute(array($email,$password, $id));
        Database::disconnect();
        header("Location: list.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $email = $data['email'];
    $mobile = $data['password'];
    Database::disconnect();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Create a Customer</h3>
            </div>
            <form class="form-horizontal" action="create.php" method="post">
                <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)) : ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="control-group <?php echo !empty($passwordError) ? 'error' : ''; ?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="password" placeholder="Password" value="<?php echo !empty($password) ? $password : ''; ?>">
                            <?php if (!empty($passwordError)) : ?>
                                <span class="help-inline"><?php echo $passwordError; ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn btn-dark" href="list.php">Back</a>

                        </div>
                    </div>

            </form>
        </div>
    </div> <!-- /container -->
</body>


</html>