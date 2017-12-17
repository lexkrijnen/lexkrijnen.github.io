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















$file_result = "";

if ($_FILES['file']['error'] > 0) {
    $file_result .= "No File Uploaded or Invalid File ";
    $file_result .= "Error code: " . $_FILES['file']['error'] . "<br>";
    print("1: " . $file_result . "<br>");
} else {
    $file_result .=
        "Upload: " . $_FILES['file']['name'] . "<br>" .
        "Type: " . $_FILES['file']['type'] . "<br>" .
        "Size: " . ($_FILES['file']['size'] / 1024) . "Kb<br>" .
        "Temp file: " . $_FILES['file']['tmp_name'] . "<br>";

    print("2: " . $file_result . "<br>");
    move_uploaded_file($_FILES['file']['tmp_name'], "/var/www/html/test/uploads/" . $_FILES['file']['name']);
    $file_result .= "File Upload Succesful!";
    print("3: " . $file_result . "<br>");
    var_dump($_FILES);
}
?>