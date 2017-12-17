<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['name'];
    $fileTmpName = $_FILES['tmp_name'];
    $fileSize = $_FILES['size'];
    $fileError = $_FILES['error'];
    $fileType = $_FILES['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = uniqid('',true). "." . $fileActualExt;
                $fileDestination = '/var/www/html/test/uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: upload_test.php?uploadsuccess");
            } else {
                print ("Het bestand is te groot.");
            }
        } else {
            print("Er is iets mis gegaan met het uploaden.");
        }
    } else {
        print ("Dit bestandstype word niet ondersteunt.");
    }
}
?>