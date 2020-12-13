<?php
require "database.php";
$id = null;
if (!empty($_GET["id"])) {
    $id = $_REQUEST["id"];
}

if (null == $id) {
    header("location: list.php");
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
                <div class="control-group">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data["email"]; ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data["password"]; ?>
                        </label>
                    </div>
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