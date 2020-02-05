<?php 
	include_once("connection.php");
	if (isset($_POST['update'])) {	
		$userId			= $_POST['userId'];
		$username 		= $_POST['username'];
		$password 		= $_POST['password'];
		$email 			= $_POST['email'];
		$phone 			= $_POST['phone'];
		$encodedImage 	= $_POST['accountIamge'];

		if (is_null($encodedImage) || $encodedImage == "") {
			$query  = "UPDATE tbl_accounts SET username = '$username',password = '$password',
		        email = '$email',phone = '$phone' WHERE id = '$userId'";
		    }
		else {
			$now 			= DateTime::CreateFromFormat('U.u',microtime(true));
			$id 			= $now->format('YmdHsiu');	
			$upload_folder 	= "img/accounts";
			$path			= "$upload_folder/$id.jpg";
			file_put_contents($path, base64_decode($encodedImage));

			$query  = "UPDATE tbl_accounts SET username = '$username',password = '$password',
		        email = '$email',phone = '$phone',pic = 'includes/$path' WHERE id = '$userId'";
		    }

		$result = mysqli_query($conn, $query);
		if(isset($path)) {
		    echo "includes/".$path;
		    exit();
		} else {
		    echo "Failed";
		    exit();
		}
	}


 ?>