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
    include "header.php";
    include "dbpaper.php";
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
    if ($_GET['action'] == "update") {
        $sql = "select * from paper where id =" . $_GET['id'];
        $result = mysqli_query($conn, $sql);
    }
    $my_row = mysqli_fetch_object($result);
    ?>
    <section class="search-banner text-white py-3 form-arka-plan" id="search-banner">
        <form action="update_process.php" method="post" enctype="multipart/form-data">
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
                                                <option selected hidden><?php echo $my_row->course ?></option>
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
                                                <option selected hidden><?php echo $my_row->month ?></option>
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
                                                <option selected hidden><?php echo $my_row->year ?></option>
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
                                            <input id="my-file-selector" type="file" name="file" style="display:none;">
                                            <input type="hidden" name="id" value="<?php echo $my_row->id ?>">
                                            Browse...
                                        </label>

                                    </div>
                                    <div class="col-md-5">
                                        <input id="up-file" type="text" class="form-control" name="file" readonly=""
                                               placeholder="<?php echo $my_row->filename ?>"></input>
                                        <input type="hidden" name="filename" value="<?php echo $my_row->filename ?>">

                                    </div>
                                    <div class="col-md-2">
                                        <button name="btn-upload" type="submit" class="btn btn-primary btn-block">
                                            Update
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="list.php" class="btn btn-secondary btn-block" role="button">Cancel</a>
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
</body>
</html>

