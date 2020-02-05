<?php 
	if (isset($_POST['update'])) {
		$target = "image/".basename($_FILES["fileToUpload"]["name"]);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
			echo "Sucuess";
		}
		else {
			echo "Failed";
		}
	}
	echo $_FILES["fileToUpload"]["tmp_name"];



 ?>