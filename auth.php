<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?php
    include "header.php"
    ?>
</head>

<body>
<?php

$userN = $_POST["admin-name"];
$passW = $_POST["admin-pass"];

$success = false;

if (($userN == 'seadmin') && ($passW == 'seadmin')) {
    $success = true;
}

if ($success) {
    $_SESSION["user"] = $_POST["admin-name"];
    ?>
    <div class="container">
        <div class="content">
            <div class="alert alert-success" role="alert">
                <strong>Welcome <?php
                    echo $userN . "!";
                    ?></strong> You have successfully sign in.
            </div>
            <meta http-equiv="refresh" content="3;url=upload.php"/>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="container">
        <div class="content">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Wrong username or password!</h4>
                Please try again.
            </div>
            <meta http-equiv="refresh" content="3;url=admin.php"/>
        </div>
    </div>
    <?php
}
?>

</body>
</html>
