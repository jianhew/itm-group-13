<!DOCTYPE html>
<html>
<head>
    <title>Past Year Exam Paper</title>
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/gb.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?php
    include "header.php";
    include "dbpaper.php";

    require 'vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;
    use Aws\S3\Sdk;

    // AWS Info
    $bucketName = getenv('S3_BUCKET');
    $IAM_KEY = getenv('AWS_ACCESS_KEY_ID');
    $IAM_SECRET = getenv('AWS_SECRET_ACCESS_KEY');

    // Connect to AWS
    try {
        // You may need to change the region. It will say in the URL when the bucket is open
        // and on creation.
        $s3 = S3Client::factory(
            array(
                'credentials' => array(
                    'key' => $IAM_KEY,
                    'secret' => $IAM_SECRET
                ),
                'version' => 'latest',
                'region' => 'us-west-2'
            )
        );
    } catch (Exception $e) {
        // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
        // return a json object.
        die("Error Client: " . $e->getMessage());
    }

    $sql = "select * from paper where id =" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $my_row = mysqli_fetch_object($result);

    $oldName = $my_row->month . " " . $my_row->year . " " . $my_row->filename;
    $oldName = "paper/" . $oldName;

    // Delete old files
    $s3->deleteObject([
        'Bucket' => $bucketName,
        'Key' => $oldName
    ]);

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

    include 'dbpaper.php';

    $sql = "delete from paper where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="content">
        <div class="container">
            <?php if ($result){ ?>
            <div class="alert alert-success" role="alert">
                <strong>Congrats</strong> Remove successfully.
            </div>
            <meta http-equiv="refresh" content="3;url=list.php"/>
        </div>

        <?php
        } else {
            ?>
            <div class="alert alert-success" role="alert">
                <strong>Oops</strong> Fail to Remove.
            </div>

            <?php
        } ?>
    </div>
</div>
</div>

<?php
include "footer.php"
?>

</body>
</html>
