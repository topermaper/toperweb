<?php

if (empty($_FILES)) {
	return;
}

$file_count = count($_FILES['filesToUpload']['name']);

for ($i = 0; $i < $file_count; $i++) {

	// for easy access
	$fileName     = $_FILES['filesToUpload']['name'][$i];
	$fileTempName = $_FILES['filesToUpload']['tmp_name'][$i];
	$error        = $_FILES['filesToUpload']['error'][$i];

	// check whether file has temporary path and whether it indeed is an uploaded file
	if(!empty($fileTempName) && is_uploaded_file($fileTempName)) {
		// move the file from the temporary directory to somewhere of your choosing
		move_uploaded_file($fileTempName, "uploads/" . $fileName);
		// mark-up to be passed to jQuery's success function.
		echo '<p>File <strong><a href="uploads/' . $fileName . '" target="_blank">' . $fileName . '</a></strong> uploaded successfully !</p>';
	}

}


?>
