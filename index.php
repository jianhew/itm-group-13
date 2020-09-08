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


    <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
        <form method="post" action="results.php" onsubmit="return validateForm()">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card acik-renk-form">
                            <div class="card-body">
                                <div class="row">

                                    <p class="font-weight-light text-dark col-md-4">Course</p>
                                    <p class="font-weight-light text-dark col-md-4">Month</p>
                                    <p class="font-weight-light text-dark col-md-4">Year</p>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="sel-course" class="form-control" name="course">
                                                <option selected>Please Select</option>
                                                <option>BBUS</option>
                                                <option>BCSI</option>
                                                <option>BQSI</option>
                                                <option>DITN</option>
                                                <option>DMCM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="sel-month" class="form-control" name="month" title="hello">
                                                <option selected>Please Select</option>
                                                <option>Jan</option>
                                                <option>Mar</option>
                                                <option>Apr</option>
                                                <option>May</option>
                                                <option>Jun</option>
                                                <option>Jul</option>
                                                <option>Aug</option>
                                                <option>Sep</option>
                                                <option>Oct</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="sel-year" class="form-control" name="year">
                                                <option selected>Please Select</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-weight-light text-dark">Search</p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <input id="searchbox" type="text" class="form-control"
                                                   placeholder="Enter what you want to search" name="search">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                                    </div>

                                    <?php
                                    if (isset($_SESSION["user"])) {
                                        ?>
                                        <div class="col-md-2">
                                            <a href="upload.php" class="btn btn-secondary btn-block" role="button">Go to
                                                Upload</a>
                                        </div>
                                        <?php
                                    } else {
                                    } ?>
                                    <div class="col-md-2">
                                        <a href="list.php" class="btn btn-secondary btn-block" role="button">Show
                                            All</a>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="reset" class="btn btn-secondary btn-block" role="button">Reset</a>
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
