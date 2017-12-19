<?php

 $targetfolder = "pdf/";

 $targetfolder = $targetfolder . basename( $_FILES['document']['name']) ;

if(move_uploaded_file($_FILES['document']['tmp_name'], $targetfolder))

 {

 echo "The file ". basename( $_FILES['document']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading file";

 }

 ?>
