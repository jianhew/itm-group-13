<!DOCTYPE html>
<html>
<head>
    <title>Past Year Exam Paper</title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
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
    if (isset($_SESSION["user"])) {
        ?>

        <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
            <form action="upload_process.php" method="post" onsubmit="return validateAdmin()"
                  enctype="multipart/form-data">
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
                                            <div class="form-group ">
                                                <select id="up-course" class="form-control" name="course">
                                                    <option selected hidden>Please Select</option>
                                                    <option>BBUS</option>
                                                    <option>BCSI</option>
                                                    <option>BQSI</option>
                                                    <option>DITN</option>
                                                    <option>DMCM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <select id="up-month" class="form-control" name="month">
                                                    <option selected hidden>Please Select</option>
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
                                            <div class="form-group ">
                                                <select id="up-year" class="form-control" name="year">
                                                    <option selected hidden>Please Select</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2020</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="font-weight-light text-dark">Select file to upload</p>
                                    <div class="row">
                                        <div class="col-md-1 text-dark">
                                            <label id="browsebutton" class="btn btn-primary input-group-addon"
                                                   for="my-file-selector">
                                                <input id="my-file-selector" type="file" name="file"
                                                       style="display:none;">
                                                Browse...
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input id="up-file" type="text" class="form-control" name="file"
                                                   readonly="">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary btn-block">Upload</button>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="index.php" class="btn btn-secondary btn-block" role="button">Go to
                                                Search</a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="list.php" class="btn btn-secondary btn-block" role="button">Show
                                                All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    <?php } else {
        ?>
        <div class="container">
            <div class="content">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Only Admin Allow</h4>
                    Please try again.
                </div>
                <meta http-equiv="refresh" content="3;url=admin.php"/>
            </div>
        </div>
        <?php
    } ?>
</div>
<?php
include "footer.php"
?>
</body>
</html>
