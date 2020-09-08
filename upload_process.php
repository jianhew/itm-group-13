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
    include "header.php";
    include "dbpaper.php";

    require 'vendor/autoload.php';

    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

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
        die("Error: " . $e->getMessage());
    }

    $keyName = 'paper/' . basename($_POST["month"] . " " . $_POST["year"] . " " . $_FILES["file"]['name']);
    $pathInS3 = 'https://s3.us-west-2.amazonaws.com/' . $bucketName . '/' . $keyName;

    try {
        // Uploaded:
        $file = $_FILES["file"]['tmp_name'];

        $s3->putObject(
            array(
                'Bucket' => $bucketName,
                'Key' => $keyName,
                'SourceFile' => $file,
                'StorageClass' => 'REDUCED_REDUNDANCY',
                'ContentType' => 'application/pdf',
                'ACL' => 'public-read'
            )
        );

    } catch (S3Exception $e) {
        die('Error: S3' . $e->getMessage());
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
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

    $file = $_FILES["file"]['name'];
    $course = $_POST["course"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    include 'dbpaper.php';
    $sql = "select * from paper";
    $result = mysqli_query($conn, $sql);

    $fileExists = 0;
    while ($row = mysqli_fetch_array($result)) {
        if (($row['filename'] == $file) && ($row['course'] == $course) && ($row['month'] == $month) && ($row['year'] == $year)) {
            $fileExists = 1;
        }
    }

    if ($fileExists == 0) {
        $target = "paper/";
        $fileTarget = $target . $file;
        $tempFileName = $_FILES['file']['tmp_name'];
        $result = move_uploaded_file($tempFileName, $fileTarget);

        if ($result) {
            $sql = "insert into paper(filename,filepath,course,month,year) values('$file','$fileTarget','$course','$month','$year')";
            mysqli_query($conn, $sql);
        }
        ?>

        <div class="content">
            <div class="container">
                <div class="alert alert-success" role="alert">
                    <strong>Congrats</strong> Upload Successfully.
                </div>
                <meta http-equiv="refresh" content="3;url=upload.php"/>
            </div>
        </div>
        <?php

    } else {

        ?>
        <div class="content">
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <strong>Error</strong> File Exists.
                </div>
                <meta http-equiv="refresh" content="3;url=upload.php"/>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>
<?php
include "footer.php"
?>
</body>
</html>
