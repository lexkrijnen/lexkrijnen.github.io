<?php

 $targetfolder = "pdf/";

 $targetfolder = $targetfolder . basename( $_documentS['document']['name']) ;

if(move_uploaded_document($_documentS['document']['tmp_name'], $targetfolder))

 {

 echo "The document ". basename( $_documentS['document']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading document";

 }

 ?>
