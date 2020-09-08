<!DOCTYPE html>
<html>
<head>
    <title>Past Year Exam Paper</title>
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
    <div class="container">
        <?php
        $link = "https://itm-group-13.s3-us-west-2.amazonaws.com/paper/" . $_GET['paperno'];
        ?>
        <iframe src="<?php echo $link; ?>" width="100%" height="550px">
        </iframe>
    </div>
</div>

</body>
</html>
