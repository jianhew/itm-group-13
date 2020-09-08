<!DOCTYPE html>
<html>
<head>
    <title>Sign Out</title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900|Material+Icons"
          rel="stylesheet">
    <?php
    include "header.php"
    ?>
</head>
<body>
<div class="content">
    <div class="container">
        <div class="title">
            <h1>
            </h1>
        </div>
    </div>

    <?php
    session_destroy();
    ?>
    <div class="content">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <strong>Alert</strong> Sign Out Successfully.
            </div>
            <meta http-equiv="refresh" content="3;url=admin.php"/>
        </div>
    </div>
</div>
</div>
<?php
include "footer.php"
?>
</body>
</html>
