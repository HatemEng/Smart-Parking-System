<?php 
	include_once("connection.php");

	if (isset($_POST['changePassword'])) {
		$username 		= $_POST['username'];
		$newPassword 	= $_POST['password'];
		$email 			= $_POST['email'];

		$query = "SELECT * FROM tbl_accounts ".
		" WHERE username = '$username' AND email = '$email'";
		$result = mysqli_query($conn, $query);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == $newPassword) {
				echo "same";
				exit();
			} else {
				$userId = $row['id'];
				$query  = "UPDATE tbl_accounts SET password = '$newPassword'WHERE id = '$userId'";
				$result = mysqli_query($conn, $query);
				echo "success";
				exit();
			}
		} else {
			echo "no match";
			exit();
		}
	
	}

 ?>