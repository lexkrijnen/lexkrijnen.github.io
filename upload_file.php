<?php
	$targetfolder = "pdf/";
	$targetfolder = $targetfolder . basename( $_FILES['document']) ;

	if(move_uploaded_file($_FILES['document'], $targetfolder)) {
		echo "Het bestand: <i>". basename( $_FILES['document']). "</i> is succesvol geuploadt.";
	} else {
		echo "Er is een probleem opgetreden tijdens het uploaden.";
	}
?>
