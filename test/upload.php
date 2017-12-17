<?php
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
        "Temp file: " . $_FILES['file']['temp_name'] . "<br>";

    print("2: " . $file_result . "<br>");
    move_uploaded_file($_FILES['file']['tmp_name'], "/var/www/html/test/uploads/" . $_FILES['file']['name']);
    $file_result .= "File Upload Succesful!";
    print("3: " . $file_result . "<br>");
}
?>