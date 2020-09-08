<!DOCTYPE html>
<html>
<head>
    <title>Past Year Exam Paper</title>
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/main.css" rel="stylesheet">

    <?php
    include "header.php";
    include "dbpaper.php";
    ?>

</head>

<body>

<div class="content">
    <div class="container">
        <div class="title">

            <?php
            $default = 'Please Select';
            $search = $_POST['search'];
            $course = $_POST["course"];
            $month = $_POST["month"];
            $year = $_POST["year"];

            if ($course == $default) {
                $course = "";
            }
            if ($month == $default) {
                $month = "";
            }
            if ($year == $default) {
                $year = "";
            }
            $so = $search;
            $so = strtolower($so);
            $sql = "select * from paper where course like '%$course%' and month like '%$month%' and year like '%$year%' and filename like '%$so%'";
            $r = mysqli_query($conn, $sql);
            ?>

            <?php
            if (mysqli_num_rows($r) == 0) {
                echo "Nothing";
            } else {
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course</th>
                        <th scope="col">Filename</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <?php
                        if (isset($_SESSION["user"])) {
                            ?>
                            <th scope="col">Action</th>
                        <?php } else {
                        } ?>
                    </tr>
                    </thead>
                </table>

                <div id="table-wrapper">
                    <div id="table-scroll">
                        <table class="table table-hover">
                            <tbody>
                            <?php
                            $count = 1;
                            while ($my_row = mysqli_fetch_object($r)) {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $my_row->course; ?></td>
                                    <td><a style="color:#5380f7"
                                      href="view.php?paperno=<?php echo $my_row->month . " " . $my_row->year . " " . $my_row->filename; ?>">
                                            <?php
                                            echo $my_row->filename . "<br>";
                                            ?>
                                        </a></td>
                                    <td><?php echo $my_row->month; ?></td>
                                    <td><?php echo $my_row->year; ?></td>
                                    <?php
                                    $count++;
                                    if (isset($_SESSION["user"])) {
                                        ?>
                                        <td><?php echo "<a href = update.php?action=update&id=" . $my_row->id . ">Edit</a>"; ?>
                                          <?php echo " | <a href='#' data-toggle='modal' data-target='#exampleModal" . $my_row->id . "'>Remove</a>"; ?>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $my_row->id; ?>"
                                             tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirm to
                                                            remove <?php echo $my_row->filename; ?>?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Undo is not possible once removed.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                        <?php echo "<a class='btn btn-primary btn-block' role='button' href = delete.php?action=delete&id=" . $my_row->id . ">Remove</a>"; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else {
                                    } ?>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include "footer.php"
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="style.js"></script>
</body>
</html>
