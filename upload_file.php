<?php
if(isset($_FILES['file'])){
    print_r($_FILES);
    $errors= array();
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

    $expensions= array("pdf", "PDF");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Dit bestandstype is niet toegestaan, gebruik aub alleen .pdf bestanden.";
				sleep(5);
        header("Location: /test_PDF_upload.php");
    }

    if($file_size > 2097152){
        $errors[]='Het bestand is te groot.';
				sleep(5);
        header("Location: /test_PDF_upload.php");
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"pdf/".$file_name);

				$db = "mysql:host=localhost; dbname=Wegro; port=3306";
        $user = "wegro";
        $pass = "SQLWegro@101";
        $pdo = new PDO($db, $user, $pass);

				$sql = "INSERT INTO Contract (document) VALUES (" . $file_name . ")";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();

        header("Location: /test_PDF_upload.php?bestandnaam='" . $file_name . "'");
				die();
    }else{
        print_r($errors);
    }
}
?>
