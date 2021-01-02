<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Consulta</title>
</head>

<body>
    <h3> Crud Grid</h3>
    <div class="container">
        <div class="row">
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "database.php";
                    $pdo = Database::connect();
                    $sql = "SELECT * FROM users ORDER BY id DESC";
                    ?>
                    <?php foreach ($pdo->query($sql) as $row) {
                        echo " <tr>";
                        echo "<td>" . $row['id'];
                        echo "<td>" . $row['email'];
                        echo "<td>" . $row['username'];
                        echo "<td>" . $row["role"];
                        echo "<td>" . $row["created_at"];
                        echo "<td>" . $row["updated_at"];
                        echo '<td><a class="btn btn-primary" href="read.php?id='.$row['id'].'">Read</a>';
                        echo ' ';
                        echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
</body>

</html>