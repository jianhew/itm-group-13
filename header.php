<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900|Material+Icons"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
?>

<body>
<section class="search-banner text-white py-5 form-arka-plan" id="search-banner">
    <form method="post" action="results.php" onsubmit="return validateForm()">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card acik-renk-form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <header class="header">

                                        <a class="logo" href="index.php">Past Year Exam Paper</a>


                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</section>
</body>
</html>
