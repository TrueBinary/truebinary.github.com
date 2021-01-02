<?php
if(!isset($_SESSION)){
    session_start();
}
if (empty($_SESSION["messages"])){
    return;
}

$messages = $_SESSION["messages"];
unset($_SESSION["messages"]);
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="page.css" rel="stylesheet">
</head>
<?php if(isset($_SESSION['message'])): ?>
    <div class="message">
        <p>
            <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            ?>
        </p>
    </div>
<?php endif ?>    
<div class=form-register>
    <?php foreach ($messages as $messages) : ?>
        <p class=form-control><?php echo $messages; ?></p>
    <?php endforeach; ?>
</div>