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

    $keyName = 'paper/' . basename($_POST["month"] . " " . $_POST["year"] . " " . $_FILES["file"]['name']);
    $pathInS3 = 'https://s3.us-west-2.amazonaws.com/' . $bucketName . '/' . $keyName;

    // Select new file to replace
    if ($_FILES["file"]['name'] != "") {
        try {
            // Uploaded
            $file = $_FILES["file"]['tmp_name'];
            if ($file == "") {
                $file = $_POST["filename"];
            }

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
    } // Not upload new file
    else {
        $sql = "select * from paper where id =" . $_POST['id'];
        $result = mysqli_query($conn, $sql);
        $my_row = mysqli_fetch_object($result);
        $oldName = $my_row->month . " " . $my_row->year . " " . $my_row->filename;
        $oldName = "paper/" . $oldName;
        $file = $_POST["month"] . " " . $_POST["year"] . " " . $_POST["filename"];
        $newName = "paper/" . $file;

        // Rename the file by copying it
        try {
            $result = $s3->copyObject(
                array(
                    'Bucket' => $bucketName,
                    'Key' => $newName,
                    'CopySource' => "{$bucketName}/{$oldName}",
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

        // Delete old files
        $s3->deleteObject([
            'Bucket' => $bucketName,
            'Key' => $oldName
        ]);


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
    if ($file == "") {
        $file = $_POST["filename"];
    }
    $course = $_POST["course"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $target = "paper/";
    $fileTarget = $target . $file;
    $tempFileName = $_FILES['file']['tmp_name'];
    $result = move_uploaded_file($tempFileName, $fileTarget);

    include 'dbpaper.php';
    $sql = "update paper set course='$course', month='$month',year ='$year',filepath='$fileTarget',filename='$file' where id=" . $_POST['id'];
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="content">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <strong>Congrats</strong> Update Successfully.
            </div>
            <meta http-equiv="refresh" content="3;url=list.php"/>
        </div>
    </div>

</div>
</div>
<?php
include "footer.php"
?>

</body>
</html>
