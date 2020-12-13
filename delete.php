<?php
require 'database.php';
$id = 0;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (!empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM users  WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Delete a Customer</h3>
            </div>

            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <p class="alert alert-danger">Are you sure to delete ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn btn-dark" href="list.php">No</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->
</body>

</html>