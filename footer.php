<!DOCTYPE html>
<html>
<head>
    <title>Past Year Exam Paper</title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php
    ?>
</head>
<body>

<div class="footer py-5">
    <div class="container">
        <div class="row ">
        </div>
        <hr class="footer-line">
        <div class="row ">
            <div class="col-md-1">
                <div class="footer-widget ">
                </div>
            </div>
            <div class="col-md-1">
                <div class="footer-widget ">
                    <a href="about.php">About</a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="footer-widget ">
                    <a href="links.php">Links</a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="footer-widget ">
                    <a href="https://newinti.edu.my/">NewInti</a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="footer-widget ">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeNAbKF1LmTkUqqAj92A11vGHxoLmBCHAZ6thyThuW_kynmXw/viewform">Feedback</a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="footer-widget ">

                    <?php
                    if (isset($_SESSION["user"])) {
                        ?>
                        <a href="destroy.php">Sign Out</a>
                        <?php
                    } else {
                        ?>
                        <a href="admin.php">Admin</a>
                        <?php
                    }
                    ?>

                </div>
            </div>

            <div class="col-md-6">
                <div class="footer-widget ">

                    <p>Created by ITM 3206 Aug 2020. Academic Purpose.</p>

                </div>
            </div>
        </div>
        <hr class="footer-line">
    </div>
</div>
</body>
</html>
