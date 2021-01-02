<?php
require "database.php";
$id = null;
if (!empty($_GET["id"])) {
    $id = $_REQUEST["id"];
}

if (null == $id) {
    header("Location: list.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container-md">
        <div class="span10 offset1">
            <div class="row">
                <h3>Read A customer</h3>
            </div>

            <div class="form-horizontal">
                <div class="form-group has-success">
                    <label class="control-label">
                        <h4>Username:<?php echo $data["username"]; ?></h4>
                    </label>
                </div>
            </div>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">
                        <h4>Email Address:<?php echo $data["email"]; ?></h4>
                    </label>
                </div>
            </div>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">
                        <h4>Role: <?php echo $data["role"]; ?>
                        </h4>
                    </label>
                </div>
            </div>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">
                        <h4>Password:<?php echo $data["password"]; ?></h4>
                    </label>
                </div>
            </div>

            <div>
                <div class="form-actions">
                    <a class="btn btn-dark" href="list.php">Back</a>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</body>

</html>