<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php
    include "header.php";
    session_destroy();
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

    <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
        <form method="post" action="auth.php" onsubmit="return validateForm()">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="card acik-renk-form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="font-weight-light text-dark">Admin</p>
                                        <div class="form-group ">
                                            <input id="name" type="text" class="form-control"
                                                   placeholder="Enter name" name="admin-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <p class="font-weight-light text-dark">Password</p>
                                            <input id="pass" type="text" class="form-control"
                                                   placeholder="Enter password" name="admin-pass">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="index.php" class="btn btn-secondary btn-block"
                                           role="button">Cancel</a>
                                    </div>

                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?php
include "footer.php"
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
